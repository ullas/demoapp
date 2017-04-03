<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * EmployeeAbsencerecords Controller
 *
 * @property \App\Model\Table\EmployeeAbsencerecordsTable $EmployeeAbsencerecords
 */
class EmployeeAbsencerecordsController extends AppController
{

   var $components = array('Datatable');
	public function timesheet()
	{
	}
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		$usrfilter="";
        if( isset($this->request->session()->read('sessionuser')['empdatabiographyid']) && ($this->request->session()->read('sessionuser')['empdatabiographyid'])!=null ){
      
			$usrfilter.="EmployeeAbsencerecords.emp_data_biographies_id ='" .$this->request->session()->read('sessionuser')['empdatabiographyid']. "' and EmployeeAbsencerecords.customer_id ='".$this->loggedinuser['customer_id'] . "'";
		}else{
			$usrfilter.="EmployeeAbsencerecords.customer_id ='".$this->loggedinuser['customer_id'] . "'";
		}
		
		if( isset($this->request->query['filter']) && ($this->request->query['filter'])!=null && strlen($usrfilter)>3){
      
			if($this->request->query['filter'] == "pending"){$usrfilter.=" and EmployeeAbsencerecords.status = '0' ";}
			else if($this->request->query['filter'] == "approved"){$usrfilter.=" and EmployeeAbsencerecords.status = '1' ";}
			else if($this->request->query['filter'] == "denied"){$usrfilter.=" and EmployeeAbsencerecords.status = '2' ";}
		}
		
		$contains=['Empdatabiographies', 'TimeTypes', 'Users','Customers'];
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
	public function denyLeaveRequest()
	{
    	$this->loadModel('Workflows');
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			
			$workflow = $this->Workflows->get($this->request->query['id'], [
            	'contain' => []
        	]);
			
            $workflow=$this->Workflows->patchEntity($workflow,$this->request->data);
			$workflow['active']=FALSE;
			$workflow['user_id']=$this->request->session()->read('sessionuser')['id'];
			
			if ($this->Workflows->save($workflow)) {
				
				$this->loadModel('EmployeeAbsencerecords');
				//get employeeabsencerecord primary key value
				$arr = $this->EmployeeAbsencerecords->find('all',[ 'conditions' => array('workflow_id' => $workflow['id'])])->toArray();
				if(isset($arr[0])){ $empabsrecid = $arr[0]['id']; }
                
				$employeeAbsencerecord = $this->EmployeeAbsencerecords->get($empabsrecid, [
            		'contain' => []
        		]);
				$employeeAbsencerecord = $this->EmployeeAbsencerecords->patchEntity($employeeAbsencerecord, $this->request->data);
				$employeeAbsencerecord["status"] = "2"; 
           	 	if ($this->EmployeeAbsencerecords->save($employeeAbsencerecord)) {
					$this->response->body("success");
	    			return $this->response;
				}
            } else {
                $this->response->body("error");
	    		return $this->response;
            }
		}  
    }
	public function approveLeaveRequest()
	{
    	$this->loadModel('Workflows');
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			
			$workflow = $this->Workflows->get($this->request->query['id'], [
            	'contain' => []
        	]);
			
            $workflow=$this->Workflows->patchEntity($workflow,$this->request->data);
			$workflow['user_id']=$this->request->session()->read('sessionuser')['id'];
			
			if($workflow['currentstep']==$workflow['lastaction']){
				$this->loadModel('EmployeeAbsencerecords');
				$employeeAbsencerecord = $this->EmployeeAbsencerecords->get($workflow['id'], [
            		'contain' => []
        		]);
				$employeeAbsencerecord = $this->EmployeeAbsencerecords->patchEntity($employeeAbsencerecord, $this->request->data);
				$employeeAbsencerecord["status"] = "1"; 
           	 	if ($this->EmployeeAbsencerecords->save($employeeAbsencerecord)) {
					$workflow['active']=FALSE;
				}
								
			}else{
				$workflow['currentstep']+=1;	
			}
			
			$this->loadModel('Workflows');
			if ($this->Workflows->save($workflow)) {
                $this->response->body("success");
	    		return $this->response;
            } else {
                $this->response->body("error");
	    		return $this->response;
            }
		}
		  
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['Empdatabiographies', 'TimeTypes', 'Users','Customers']
        ];
        $employeeAbsencerecords = $this->paginate($this->EmployeeAbsencerecords);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('employeeAbsencerecords'));
        $this->set('_serialize', ['employeeAbsencerecords']);
        
		$query=$this->EmployeeAbsencerecords->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['status'=>'0'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $reqcount=$query->count() : $reqcount="";		
		$query=$this->EmployeeAbsencerecords->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['status'=>'1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $approvedcount=$query->count() : $approvedcount="";		
		$query=$this->EmployeeAbsencerecords->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['status'=>'2'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $rejcount=$query->count() : $rejcount="";
		$this->set(compact('reqcount','approvedcount','rejcount'));
		
		
		$this->set('userdateformat', Configure::read('userdf'));
		//get position id 
    	// $jobinfosTable = TableRegistry::get('JobInfos');	
		// $query=$jobinfosTable->find('All')->where(['employee_id'=>$this->request->session()->read('sessionuser')['employee_id']])->toArray();
		// (isset($query[0])) ? $myposition=$query[0]['position_id'] : $myposition="0";
// 		
		// //get distinct workflowruleid having the particular position id
		// $workflowactionsTable = TableRegistry::get('Workflowactions');
		// $query = $workflowactionsTable->find('All')->where(['position_id'=>$myposition])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]) ->distinct(['workflowrule_id']);
// 		
		// // Iterating the query.
		// $lcontent=array();
		// foreach ($query as $row) {	
			// $workflowsTable = TableRegistry::get('Workflows');
			// $execquery = $workflowsTable->find('All')->where(['workflowrule_id'=>$row['workflowrule_id']])->andwhere(['currentstep'=>$row['stepid']])->andwhere(['Workflows.active'=>TRUE])
								// ->andwhere(['Workflows.customer_id'=>$this->loggedinuser['customer_id']])->contain(['EmpDataBiographies'=> ['Employees'],'EmployeeAbsencerecords'=> ['TimeTypes'],'Workflowrules'])
								// ->leftJoin('EmpDataBiographies', 'EmpDataBiographies.workflow_id = Workflows.id')
         						// ->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
         						// ->toArray();
			// if(isset($execquery) && $execquery!=null ) { array_push($lcontent,$execquery); };
// 			
		// }
		// $this->set('leaveapprovalcontent', $lcontent);  
		
		
		
    }

    /**
     * View method
     *
     * @param string|null $id Employee Absencerecord id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->get($id, [
            'contain' => ['Empdatabiographies', 'TimeTypes', 'Users','Customers']
        ]);
		if($employeeAbsencerecord['customer_id']==$this->loggedinuser['customer_id'])
		{			
			//associated Workflows 
         	$this->loadModel('WorkflowsHistory');
			$arr = $this->WorkflowsHistory->find('All')->where(['workflow_id' => $employeeAbsencerecord["workflow_id"]])->order(['updatetime' => 'ASC'])->contain(['Users']) ;

			// $this->Flash->success(__('The data------'.json_encode($arr)));	
			$this->set('workflowhistory',$arr);

				
			$timeTypes = $this->EmployeeAbsencerecords->TimeTypes->find('list', ['limit' => 200]);
			$this->set(compact('employeeAbsencerecord', 'timeTypes'));
        	$this->set('employeeAbsencerecord', $employeeAbsencerecord);
        	$this->set('_serialize', ['employeeAbsencerecord']);
		}else{
			$this->Flash->error(__('You are not Authorized.'));
			return $this->redirect(['action' => 'index']);
       }
    }
	
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->newEntity();
        if ($this->request->is('post')) {
        	
            $this->loadModel('TimeTypes');
			$arr = $this->TimeTypes->find('all',['conditions' => array('id' => $this->request->data["time_type_id"]), 'contain' => []])->toArray();
			isset($arr[0]) ? $workflowruleid = $arr[0]['workflowrule_id'] : $workflowruleid = "0";  
				
			$this->loadModel('Workflowactions');
			$query=$this->Workflowactions->find('All')->where (['workflowrule_id' => $workflowruleid])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			(isset($query)) ? $workflowactioncount=$query->count() : $workflowactioncount="";
		  
			//associated Workflows 
         	$this->loadModel('Workflows');
			$workflow = $this->Workflows->newEntity();  
			$workflow = $this->Workflows->patchEntity($workflow, $this->request->data);
			$workflow['workflowrule_id']=$workflowruleid;
			$workflow['currentstep']='1';	
			if($workflowactioncount!=""){ $workflow['lastaction']=$workflowactioncount; }
			$workflow['user_id']=$this->request->session()->read('sessionuser')['id'];
			$workflow['active']=TRUE;				
			$workflow['customer_id']=$this->loggedinuser['customer_id'];
			$workflow["emp_data_biographies_id"] = $this->request->session()->read('sessionuser')['empdatabiographyid'] ; 
            if ($this->Workflows->save($workflow)) {
            	
				$this->loadModel('Workflowactions');
            	$employeeAbsencerecord = $this->EmployeeAbsencerecords->patchEntity($employeeAbsencerecord, $this->request->data);
				$employeeAbsencerecord['customer_id']=$this->loggedinuser['customer_id'];
				$employeeAbsencerecord["emp_data_biographies_id"] = $this->request->session()->read('sessionuser')['empdatabiographyid'] ; 
				$employeeAbsencerecord["created_by"] = $this->request->session()->read('sessionuser')['id'];
				$employeeAbsencerecord["status"] = "0";
				$employeeAbsencerecord["workflow_id"] = $workflow['id'];
            	if ($this->EmployeeAbsencerecords->save($employeeAbsencerecord)) {
                	$this->Flash->success(__('The employee absencerecord has been saved.'));	
                	return $this->redirect(['action' => 'index']);	
                } else {
                	$this->Flash->error(__('The employee absencerecord could not be saved. Please, try again.'));
            	}	
            } else {
                $this->Flash->error(__('The employee absencerecord could not be saved. Please, try again.'));
            }
        }
		$this->loadModel('JobInfos');
		$arr = $this->JobInfos->find('all',['conditions' => array('employee_id' => $this->request->session()->read('sessionuser')['employee_id'] ), 'contain' => []])->toArray();
		isset($arr[0]) ? $timetypeprofileid = $arr[0]['time_type_profile_id'] : $timetypeprofileid = "0";  
		
        $timeTypes = $this->EmployeeAbsencerecords->TimeTypes->TimeTypeProfileTimeTypes
        					->find('list', array('fields' => array('id'=>'TimeTypeProfileTimeTypes.time_type_id','name'=> 'TimeTypes.name'),
    						'contain' => array('TimeTypes'), 'limit' => 200))->where(['time_type_profile_id' => $timetypeprofileid]);
							
		
			
        $empdatabiographies = $this->EmployeeAbsencerecords->Empdatabiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $users = $this->EmployeeAbsencerecords->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('employeeAbsencerecord', 'empdatabiographies', 'timeTypes', 'users'));
        $this->set('_serialize', ['employeeAbsencerecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Absencerecord id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->get($id, [
            'contain' => []
        ]);
		
		if($employeeAbsencerecord['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeAbsencerecord = $this->EmployeeAbsencerecords->patchEntity($employeeAbsencerecord, $this->request->data);
			$employeeAbsencerecord["modified_by"] = $this->request->session()->read('sessionuser')['id'] ; 
            if ($this->EmployeeAbsencerecords->save($employeeAbsencerecord)) {
            	
				$this->loadModel('TimeTypes');
				$arr = $this->TimeTypes->find('all',['conditions' => array('id' => $this->request->data["time_type_id"] ), 'contain' => []])->toArray();
				isset($arr[0]) ? $workflowruleid = $arr[0]['workflowrule_id'] : $workflowruleid = "0";  
				
				$this->loadModel('Workflowactions');
				$query=$this->Workflowactions->find('All')->where (['workflowrule_id' => $workflowruleid])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
				(isset($query)) ? $workflowactioncount=$query->count() : $workflowactioncount="";
			
				//associated Workflows 
         		$this->loadModel('Workflows');
				$workflow = $this->Workflows->get($employeeAbsencerecord["workflow_id"], ['contain' => []]);
				$workflow = $this->Workflows->patchEntity($workflow, $this->request->data);
				$workflow['workflowrule_id']=$workflowruleid;
				$workflow['user_id']=$this->request->session()->read('sessionuser')['id'];
				if($workflowactioncount!=""){ $workflow['lastaction']=$workflowactioncount; }	
				$workflow['active']=TRUE;	
				// $workflow["emp_data_biographies_id"] = $this->request->session()->read('sessionuser')['empdatabiographyid'] ; 
            	if ($this->Workflows->save($workflow)) {
                	$this->Flash->success(__('The employee absencerecord has been saved.'));
                	return $this->redirect(['action' => 'index']);
				}else {
                	$this->Flash->error(__('The employee absencerecord could not be saved. Please, try again.'));
            	}
            } else {
                $this->Flash->error(__('The employee absencerecord could not be saved. Please, try again.'));
            }
        }
		
		$this->loadModel('JobInfos');
		$arr = $this->JobInfos->find('all',['conditions' => array('employee_id' => $this->request->session()->read('sessionuser')['employee_id'] ), 'contain' => []])->toArray();
		isset($arr[0]) ? $timetypeprofileid = $arr[0]['time_type_profile_id'] : $timetypeprofileid = "0";  
		
        $timeTypes = $this->EmployeeAbsencerecords->TimeTypes->TimeTypeProfileTimeTypes
        					->find('list', array('fields' => array('id'=>'TimeTypeProfileTimeTypes.time_type_id','name'=> 'TimeTypes.name'),
    						'contain' => array('TimeTypes'), 'limit' => 200))->where(['time_type_profile_id' => $timetypeprofileid]);
							
        $empdatabiographies = $this->EmployeeAbsencerecords->Empdatabiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        // $timeTypes = $this->EmployeeAbsencerecords->TimeTypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $users = $this->EmployeeAbsencerecords->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('employeeAbsencerecord', 'empdatabiographies', 'timeTypes', 'users'));
        $this->set('_serialize', ['employeeAbsencerecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Absencerecord id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeAbsencerecord = $this->EmployeeAbsencerecords->get($id);
		if($employeeAbsencerecord['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->EmployeeAbsencerecords->delete($employeeAbsencerecord)) {
        						
				//associated Workflows 
         		$this->loadModel('Workflows');
				$workflow = $this->Workflows->get($employeeAbsencerecord["workflow_id"], ['contain' => []]);
				$workflow = $this->Workflows->patchEntity($workflow, $this->request->data);
				$workflow['active']=FALSE;	
            	if ($this->Workflows->save($workflow)) {
                	$this->Flash->success(__('The employee absencerecord has been deleted.'));
                	return $this->redirect($this->referer());
				}else {
                	$this->Flash->error(__('The employee absencerecord could not be deleted. Please, try again.'));
            	}
				            	
        	} else {
            	$this->Flash->error(__('The employee absencerecord could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->EmployeeAbsencerecords->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->EmployeeAbsencerecords->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected EmployeeAbsencerecords has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The EmployeeAbsencerecords could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
