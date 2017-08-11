<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * WorkflowsHistory Controller
 *
 * @property \App\Model\Table\WorkflowsHistoryTable $WorkflowsHistory
 */
class WorkflowsHistoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    var $components = array('Datatable');
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		$usrfilter="";
		
		//get position id 
    	$jobinfosTable = TableRegistry::get('JobInfos');	
		$query=$jobinfosTable->find('All')->where(['employee_id'=>$this->request->session()->read('sessionuser')['employee_id']])->toArray();
		(isset($query[0])) ? $mypositionid=$query[0]['position_id'] : $mypositionid="0";
		
		//get distinct workflowruleid having the particular position id
		$workflowactionsTable = TableRegistry::get('Workflowactions');
		$query = $workflowactionsTable->find('All')->where(['position_id'=>$mypositionid])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]) ->distinct(['workflowrule_id']);
		
		
		// Iterating the query.
		$leavesgrantedcontent=array();
		foreach ($query as $row) {
			if( strlen($usrfilter)>3 ){$usrfilter.=" OR ";}	
			$usrfilter.="WorkflowsHistory.workflowrule_id ='".$row['workflowrule_id'] . "' and WorkflowsHistory.currentstep ='".$row['stepid'] . "'";			
		}
		
        if( strlen($usrfilter)>3 ){ $usrfilter.=" and "; }

		$usrfilter.="WorkflowsHistory.customer_id ='".$this->loggedinuser['customer_id'] . "' and (WorkflowsHistory.status = 'Request Approved' OR WorkflowsHistory.status = 'Request Rejected')";
		
		if( isset($this->request->query['filter']) && ($this->request->query['filter'])!=null && strlen($usrfilter)>3){
      
			if($this->request->query['filter'] == "approved"){$usrfilter.=" and WorkflowsHistory.status = 'Request Approved' ";}
			else if($this->request->query['filter'] == "denied"){$usrfilter.=" and WorkflowsHistory.status = 'Request Rejected' ";}
		}
		
		$contains=['EmpDataBiographies', 'Users','Customers'];
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Workflows', 'Workflowrules', 'Customers', 'EmpDataBiographies', 'Users']
        ];
        $workflowsHistory = $this->paginate($this->WorkflowsHistory);

        $this->set(compact('workflowsHistory'));
        $this->set('_serialize', ['workflowsHistory']);
		
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        // $this->paginate = [
            // 'contain' => ['Empdatabiographies', 'TimeTypes', 'Users','Customers']
        // ];
        // $employeeAbsencerecords = $this->paginate($this->EmployeeAbsencerecords);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('employeeAbsencerecords'));
        $this->set('_serialize', ['employeeAbsencerecords']);
        
		$this->set('userdateformat', Configure::read('userdf'));
		
		
		//get position id 
    	$jobinfosTable = TableRegistry::get('JobInfos');	
		$query=$jobinfosTable->find('All')->where(['employee_id'=>$this->request->session()->read('sessionuser')['employee_id']])->toArray();
		(isset($query[0])) ? $mypositionid=$query[0]['position_id'] : $mypositionid="0";
		
		//get distinct workflowruleid having the particular position id
		$workflowactionsTable = TableRegistry::get('Workflowactions');
		$query = $workflowactionsTable->find('All')->where(['position_id'=>$mypositionid])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]) ->distinct(['workflowrule_id']);
		
		
		// Iterating the query.
		$leavesgrantedcontent=array();
		foreach ($query as $row) {	
			$workflowshistoryTable = TableRegistry::get('WorkflowsHistory');
			$execquery = $workflowshistoryTable->find('All')->where(['workflowrule_id'=>$row['workflowrule_id']])->andwhere(['currentstep'=>$row['stepid']])
								->andwhere(['WorkflowsHistory.customer_id'=>$this->loggedinuser['customer_id']])
         						->toArray();
			for ($t = 0; $t < sizeof($execquery); $t++) {
				array_push($leavesgrantedcontent,$execquery[$t]); 
			}			
		}
		$this->set('leavesgrantedcontent', $leavesgrantedcontent);
		
		$approvedcount=0;$rejcount=0;
		for ($x = 0; $x < sizeof($leavesgrantedcontent); $x++) {
			if(isset($leavesgrantedcontent[$x]['status'])){
				($leavesgrantedcontent[$x]['status']=="Request Approved")?$approvedcount+=1:$approvedcount=$approvedcount;
				($leavesgrantedcontent[$x]['status']=="Request Rejected")?$rejcount+=1:$rejcount=$rejcount;
			}
		}
		$this->set(compact('approvedcount','rejcount'));
    }

    /**
     * View method
     *
     * @param string|null $id Workflows History id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workflowsHistory = $this->WorkflowsHistory->get($id, [
            'contain' => ['Workflows', 'Workflowrules', 'Customers', 'EmpDataBiographies', 'Users']
        ]);

        $this->set('workflowsHistory', $workflowsHistory);
        $this->set('_serialize', ['workflowsHistory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workflowsHistory = $this->WorkflowsHistory->newEntity();
        if ($this->request->is('post')) {
            $workflowsHistory = $this->WorkflowsHistory->patchEntity($workflowsHistory, $this->request->data);
            if ($this->WorkflowsHistory->save($workflowsHistory)) {
                $this->Flash->success(__('The workflows history has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflows history could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->WorkflowsHistory->Workflows->find('list', ['limit' => 200]);
        $workflowrules = $this->WorkflowsHistory->Workflowrules->find('list', ['limit' => 200]);
        $customers = $this->WorkflowsHistory->Customers->find('list', ['limit' => 200]);
        $empDataBiographies = $this->WorkflowsHistory->EmpDataBiographies->find('list', ['limit' => 200]);
        $users = $this->WorkflowsHistory->Users->find('list', ['limit' => 200]);
        $this->set(compact('workflowsHistory', 'workflows', 'workflowrules', 'customers', 'empDataBiographies', 'users'));
        $this->set('_serialize', ['workflowsHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workflows History id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workflowsHistory = $this->WorkflowsHistory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workflowsHistory = $this->WorkflowsHistory->patchEntity($workflowsHistory, $this->request->data);
            if ($this->WorkflowsHistory->save($workflowsHistory)) {
                $this->Flash->success(__('The workflows history has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflows history could not be saved. Please, try again.'));
            }
        }
        $workflows = $this->WorkflowsHistory->Workflows->find('list', ['limit' => 200]);
        $workflowrules = $this->WorkflowsHistory->Workflowrules->find('list', ['limit' => 200]);
        $customers = $this->WorkflowsHistory->Customers->find('list', ['limit' => 200]);
        $empDataBiographies = $this->WorkflowsHistory->EmpDataBiographies->find('list', ['limit' => 200]);
        $users = $this->WorkflowsHistory->Users->find('list', ['limit' => 200]);
        $this->set(compact('workflowsHistory', 'workflows', 'workflowrules', 'customers', 'empDataBiographies', 'users'));
        $this->set('_serialize', ['workflowsHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workflows History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workflowsHistory = $this->WorkflowsHistory->get($id);
        if ($this->WorkflowsHistory->delete($workflowsHistory)) {
            $this->Flash->success(__('The workflows history has been deleted.'));
        } else {
            $this->Flash->error(__('The workflows history could not be deleted. Please, try again.'));
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
			    	
					$record = $this->WorkflowsHistory->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->WorkflowsHistory->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected workflows history has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The workflows history could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
