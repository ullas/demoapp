<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 */
class ActionsController extends AppController
{
	public function retirement($id = null) {
		// $this->autoRender=FALSE;
		$this->loadModel('EmploymentInfos');
		$employmentInfo = $this->EmploymentInfos->get($id, [
            'contain' => []
        ]);
		
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
		$employmentInfo = $this->EmploymentInfos->get($id, [
            'contain' => []
        ]);
		
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

		$this->loadModel('JobInfos');
		$jobInfo = $this->JobInfos->get($id, [
            'contain' => []
        ]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
           $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
		
		$customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
		$this->set(compact('jobInfo', 'customers'));
        $this->set('_serialize', ['jobInfo']);
	}
	public function promotion($id = null) {

		$this->loadModel('JobInfos');
		$jobInfo = $this->JobInfos->get($id, [
            'contain' => []
        ]);

		if ($this->request->is(['patch', 'post', 'put'])) {
           $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'edit',$id,'controller'=>'Employees']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
		
		$customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
		$this->set(compact('jobInfo', 'customers'));
        $this->set('_serialize', ['jobInfo']);
	}
	public function addresschange($id = null) {

		$this->loadModel('Addresses');
		$arr = $this->Addresses->find('all',[ 'conditions' => array('emp_data_biographies_id' => $id),
            'contain' => []
        ])->toArray();
		
		$address = $arr[0];

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

		$this->loadModel('Notes');
		$arr = $this->Notes->find('all',[ 'conditions' => array('emp_data_biographies_id' => $id),
            'contain' => []
        ])->toArray();
		
		$note = $arr[0];
		
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
	