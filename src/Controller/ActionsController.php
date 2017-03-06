<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Actions Controller
 *
 * $Actions
 */
class ActionsController extends AppController
{
	public function retirement($id = null) {

		$this->loadModel('EmploymentInfos');
		$arr = $this->EmploymentInfos->find('all',[ 'conditions' => array('employee_id' => $id),
            'contain' => []
        ])->toArray();
		
		isset($arr[0]) ? $employmentInfo = $arr[0] : $employmentInfo = $this->EmploymentInfos->newEntity();
		
		if ($this->request->is(['patch', 'post', 'put'])) {
            $employmentInfo = $this->EmploymentInfos->patchEntity($employmentInfo, $this->request->data);
            if ($this->EmploymentInfos->save($employmentInfo)) {
                $this->Flash->success(__('The employment info has been saved.'));
                return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
            } else {
                $this->Flash->error(__('The employment info could not be saved. Please, try again.'));
            }
        }
		
		$customers = $this->EmploymentInfos->Customers->find('list', ['limit' => 200]);
		$this->set(compact('employmentInfo', 'customers'));
        $this->set('_serialize', ['employmentInfo']);
	}
	
	public function terminate($id = null) {
		
		$this->loadModel('EmploymentInfos');
		$arr = $this->EmploymentInfos->find('all',[ 'conditions' => array('employee_id' => $id),
            'contain' => []
        ])->toArray();
		
		isset($arr[0]) ? $employmentInfo = $arr[0] : $employmentInfo = $this->EmploymentInfos->newEntity();
		
		if ($this->request->is(['patch', 'post', 'put'])) {
            $employmentInfo = $this->EmploymentInfos->patchEntity($employmentInfo, $this->request->data);
            if ($this->EmploymentInfos->save($employmentInfo)) {
                $this->Flash->success(__('The employment info has been saved.'));
                return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
            } else {
                $this->Flash->error(__('The employment info could not be saved. Please, try again.'));
            }
        }
		
		$customers = $this->EmploymentInfos->Customers->find('list', ['limit' => 200]);
		$this->set(compact('employmentInfo', 'customers'));
        $this->set('_serialize', ['employmentInfo']);
	}
	public function transfer($id = null) {
		
		$this->loadModel('EmpDataBiographies');
		$posarr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $id),'contain' => []])->toArray();
		isset($posarr[0]) ? $posid = $posarr[0]['position_id'] : $posid = "" ;  
		
		$this->loadModel('JobInfos');
		$arr = $this->JobInfos->find('all',[ 'conditions' => array('position_id' => $posid),'contain' => []])->toArray();

		isset($arr[0]) ? $jobInfo = $arr[0] : $jobInfo = $this->JobInfos->newEntity();  
		
		if ($this->request->is(['patch', 'post', 'put'])) {
           $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
               //associated EmpDataBiographies
            	$this->loadModel('EmpDataBiographies');
				$empdataarr = $this->EmpDataBiographies->find('all',[ 'conditions' => array('position_id' => $posid),'contain' => []])->toArray();
				isset($empdataarr[0]) ? $empDataBiography = $empdataarr[0] : $empDataBiography = $this->EmpDataBiographies->newEntity(); 
				$empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data);
            	if ($this->EmpDataBiographies->save($empDataBiography)) {
                	$this->Flash->success(__('The employee has been transferred.'));
                	
				}else{
					$this->Flash->success(__('Partially updated.'));
				}
				return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }

		$customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
		
		$this->loadModel('Employees');
		$rslt=$this->Employees->getIncludedPositions($id);  
		foreach($rslt as $key =>$value){
			$positions[$value['id']]=$value['name'];
		}
		
		$businessUnits = $this->Positions->BusinessUnits->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$departments = $this->Positions->Departments->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$divisions = $this->Positions->Divisions->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$this->set(compact('jobInfo', 'customers','positions','departments','divisions','costCentres','businessUnits'));
        $this->set('_serialize', ['jobInfo']);
	}
	public function promotion($id = null) {
		
		$this->loadModel('EmpDataBiographies');
		$posarr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $id),'contain' => []])->toArray();
		isset($posarr[0]) ? $posid = $posarr[0]['position_id'] : $posid = "" ;   
		
		$this->loadModel('JobInfos');
		$arr = $this->JobInfos->find('all',[ 'conditions' => array('position_id' => $posid),'contain' => []])->toArray();

		isset($arr[0]) ? $jobInfo = $arr[0] : $jobInfo = $this->JobInfos->newEntity();  
		
		if ($this->request->is(['patch', 'post', 'put'])) {
           $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
                //associated EmpDataBiographies
            	$this->loadModel('EmpDataBiographies');
				$empdataarr = $this->EmpDataBiographies->find('all',[ 'conditions' => array('position_id' => $id),'contain' => []])->toArray();
				isset($empdataarr[0]) ? $empDataBiography = $empdataarr[0] : $empDataBiography = $this->EmpDataBiographies->newEntity(); 
				$empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data);
            	if ($this->EmpDataBiographies->save($empDataBiography)) {
                	$this->Flash->success(__('The employee has been promoted.'));
					return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
				}             
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
		
		$customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
		$this->loadModel('Employees');
		$rslt=$this->Employees->getIncludedPositions($id);  
		foreach($rslt as $key =>$value){
			$positions[$value['id']]=$value['name'];
		}
		
		$payGrades = $this->Positions->PayGrades->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$businessUnits = $this->Positions->BusinessUnits->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$departments = $this->Positions->Departments->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$costCentres = $this->Positions->CostCentres->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$divisions = $this->Positions->Divisions->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$this->set(compact('jobInfo', 'customers','positions','departments','divisions','costCentres','businessUnits','payGrades'));
        $this->set('_serialize', ['jobInfo']);
	}
	public function addresschange($id = null) {
		
		$this->loadModel('Addresses');
		$arr = $this->Addresses->find('all',[ 'conditions' => array('employee_id' => $id),
            'contain' => []
        ])->toArray();
		
		isset($arr[0]) ? $address = $arr[0] : $address = $this->Addresses->newEntity();  
		
		if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->data);
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));
                return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
            } else {
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }
		
		$customers = $this->Addresses->Customers->find('list', ['limit' => 200]);
		$this->set(compact('address', 'customers'));
        $this->set('_serialize', ['address']);
	}
	
	public function addnote($id = null) {
		
		$this->loadModel('EmpDataBiographies');
		$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $id),'contain' => []])->toArray();
		isset($emparr[0]) ? $empid = $emparr[0]['id'] : $empid = "" ;  
		
		$this->loadModel('Notes');
		$arr = $this->Notes->find('all',[ 'conditions' => array('emp_data_biographies_id' => $empid), 'contain' => [] ])->toArray();
		
		isset($arr[0]) ? $note = $arr[0] : $note = $this->Notes->newEntity();  
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $note = $this->Notes->patchEntity($note, $this->request->data);
            if ($this->Notes->save($note)) {
                $this->Flash->success(__('The note has been saved.'));
                return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
            } else {
                $this->Flash->error(__('The note could not be saved. Please, try again.'));
            }
        }
		
		$customers = $this->Notes->Customers->find('list', ['limit' => 200]);
		$this->set(compact('note', 'customers'));
        $this->set('_serialize', ['note']);
	}
}
	