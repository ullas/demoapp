<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 */
class EmployeesController extends AppController
{
	var $components = array('Datatable');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		$contains=['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos'];
									  
		$usrfilter="Employees.customer_id ='".$this->loggedinuser['customer_id'] . "' and Employees.visible='1'";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
        // $this->set('_serialize', ['configs']);
		 
        $employees = $this->paginate($this->Employees);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		 
        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos', 'Addresses','Identities']
        ]);
		if($employee['customer_id']==$this->loggedinuser['customer_id'] && $employee['visible']=='1'){
        	$this->set('employee', $employee);
        	$this->set('_serialize', ['employee']);
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
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data,['associated' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'Customers', 'ContactInfos', 'Addresses','Identities']]);
			$employee['visible']="1";
			//saving customer_id to all associated models
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			$employee['empdatabiography']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['empdatapersonal']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['employmentinfo']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['contact_info']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['address']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['identity']['customer_id']=$this->loggedinuser['customer_id'];
			
            if ($this->Employees->save($employee)) {
                	
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
		
		$rslt=$this->Employees->getExcludedPositions();  
		foreach($rslt as $key =>$value){
			$positions[$value['id']]=$value['name'];
		}
		// $positions = $this->Employees->EmpDataBiographies->Positions->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $this->set(compact('positions', 'employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos', 'Addresses','Identities']
        ]);
		
		if($employee['customer_id'] != $this->loggedinuser['customer_id'] || $employee['visible'] != '1')
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			
            if ($this->Employees->save($employee)) {
            	//associated EmpDataBiographies
            	$this->loadModel('EmpDataBiographies');
				$arr = $this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
				if(isset($arr[0])){
					$empDataBiography = $arr[0];
					$empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data['empdatabiography']);
            		if ($this->Employees->EmpDataBiographies->save($empDataBiography)) {
              
					}
				}
				
				//associated Empdatapersonals
            		$this->loadModel('EmpDataPersonals');
					$arr = $this->EmpDataPersonals->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataPersonal = $arr[0] : $empDataPersonal = $this->EmpDataPersonals->newEntity();  
					// $empDataPersonal = $arr[0];
					$empDataPersonal = $this->EmpDataPersonals->patchEntity($empDataPersonal, $this->request->data['empdatapersonal']);
            		if ($this->Employees->EmpDataPersonals->save($empDataPersonal)) {
                			
                	}

					//associated EmpDataBiographies
            		$this->loadModel('EmploymentInfos');
					$arr = $this->EmploymentInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $employmentinfo = $arr[0] : $employmentinfo = $this->EmploymentInfos->newEntity();  						
					// $employmentinfo = $arr[0];
					$employmentinfo = $this->EmploymentInfos->patchEntity($employmentinfo, $this->request->data['employmentinfo']);
            		if ($this->Employees->EmploymentInfos->save($employmentinfo)) {
                			
               		}	
						
					//associated Contact Infos
            		$this->loadModel('ContactInfos');
					$arr = $this->ContactInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $contactinfo = $arr[0] : $contactinfo = $this->ContactInfos->newEntity();  						
					// $contactinfo = $arr[0];
					$contactinfo = $this->ContactInfos->patchEntity($contactinfo, $this->request->data['contact_info']);
					$contactinfo['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->ContactInfos->save($contactinfo)) {
                			
            		}
					
					//associated Addresses
            		$this->loadModel('Addresses');
					$arr = $this->Addresses->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $address = $arr[0] : $address = $this->Addresses->newEntity();  						
					$address = $this->Addresses->patchEntity($address, $this->request->data['address']);
					$address['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->Addresses->save($address)) {
                			
            		}
					//associated Identities
            		$this->loadModel('Identities');
					$arr = $this->Identities->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $identity = $arr[0] : $identity = $this->Identities->newEntity();  						
					// $identity = $arr[0];
					$identity = $this->Identities->patchEntity($identity, $this->request->data['identity']);
					$identity['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->Identities->save($identity)) {
                			
            		}
						
				$this->Flash->success(__('The employee has been saved.'));
				return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
		
		$this->set('id', $id);
		
		$rslt=$this->Employees->getIncludedPositions($id);  
		foreach($rslt as $key =>$value){
			$positions[$value['id']]=$value['name'];
		}
		// $this->log($positions);
		
        // $positions = $this->Employees->EmpDataBiographies->Positions->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);$this->log($positions);
		
		
        $this->set(compact('positions', 'employee'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);

        if($employee['customer_id'] == $this->loggedinuser['customer_id']) 
		{
			$employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['visible'] = "0" ;
            if ($this->Employees->save($employee)) {
            	$this->Flash->success(__('The employee has been deleted.'));
        	} else {
            	$this->Flash->error(__('The employee could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Employees->get($value);
					// $record = $this->Employees->patchEntity($record, $this->request->data);
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	   $record['visible'] = "0" ;
						   if ($this->Employees->save($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Employees has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Employees could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
