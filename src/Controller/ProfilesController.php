<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 */
class ProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function upload(){
     	print_r("testing");
     }
    public function index()
    {
    	$dependentTable = TableRegistry::get('Dependents');
		$noteTable = TableRegistry::get('Notes');
		$leaveTable = TableRegistry::get('EmployeeAbsencerecords');
		
		$query=$dependentTable->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $dependentcount=$query->count() : $dependentcount="";
		
		$query=$noteTable->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $notecount=$query->count() : $notecount="";
		
		$query=$leaveTable->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $leavecount=$query->count() : $leavecount="";

		  
    	//get empid from session var
		$empid=$this->request->session()->read('sessionuser')['employee_id'];

		$this->loadModel('Employees');
		$profiles = $this->Employees->get($empid, ['contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos', 'Addresses','Identities']]);
		
        $this->set(compact('profiles','dependentcount','notecount','leavecount'));
        $this->set('_serialize', ['profiles']);
		
		//to get position name
		$this->loadModel('EmpDataBiographies');
		$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $empid),'contain' => []])->toArray();
		if(isset($emparr[0])){ $posid = $emparr[0]['position_id'];$empdatabiographyid = $emparr[0]['id'];}else{ $posid = "" ;$empdatabiographyid="";}
		
		$this->loadModel('Positions');
		$posarr=$this->Positions->find('all',['conditions' => array('id' => $posid),'contain' => []])->toArray();
		if(isset($posarr[0])){
			$this->set('position',$posarr[0]);
		}
		
		//get notes & dependents count
		// $empdatabiographyid
    }
	public function editprofile()
    {
    	
		$dependentTable = TableRegistry::get('Dependents');
		$noteTable = TableRegistry::get('Notes');
		$leaveTable = TableRegistry::get('EmployeeAbsencerecords');
		
		$query=$dependentTable->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $dependentcount=$query->count() : $dependentcount="";
		
		$query=$noteTable->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $notecount=$query->count() : $notecount="";
		
		$query=$leaveTable->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $leavecount=$query->count() : $leavecount="";
		
    	//get empid from session var
		$empid=$this->request->session()->read('sessionuser')['employee_id'];

		$this->loadModel('Employees');
		$employee = $this->Employees->get($empid, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos', 'Addresses','Identities']
        ]);
		
		$this->set(compact('profiles','employee','dependentcount','notecount','leavecount'));
        $this->set('_serialize', ['profiles']);
		
		//to get position name
		$this->loadModel('EmpDataBiographies');
		$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $empid),'contain' => []])->toArray();
		(isset($emparr[0]))? $posid = $emparr[0]['position_id'] : $posid = "" ;
		$this->loadModel('Positions');
		$posarr=$this->Positions->find('all',['conditions' => array('id' => $posid),'contain' => []])->toArray();
		if(isset($posarr[0])){
			$this->set('position',$posarr[0]);
		}
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$this->loadModel('Employees');
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			
			$this->loadModel('Employees');
            if ($this->Employees->save($employee)) {
            		//associated EmpDataBiographies
            		$this->loadModel('EmpDataBiographies');
					$arr = $this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataBiography = $arr[0] : $empDataBiography = $this->EmpDataBiographies->newEntity();  		
						$empDataBiography = $arr[0];
						$empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data['empdatabiography']);
						$empDataBiography['customer_id']=$this->loggedinuser['customer_id'];
            			if ($this->Employees->EmpDataBiographies->save($empDataBiography)) {
                			
                		}
					
					//associated Empdatapersonals
            		$this->loadModel('EmpDataPersonals');
					$arr = $this->EmpDataPersonals->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataPersonal = $arr[0] : $empDataPersonal = $this->EmpDataPersonals->newEntity();  
						$empDataPersonal = $arr[0];
						$empDataPersonal = $this->EmpDataPersonals->patchEntity($empDataPersonal, $this->request->data['empdatapersonal']);
						$empDataPersonal['customer_id']=$this->loggedinuser['customer_id'];
            			if ($this->Employees->EmpDataPersonals->save($empDataPersonal)) {
                			
                		}

					//associated EmpDataBiographies
            		$this->loadModel('EmploymentInfos');
					$arr = $this->EmploymentInfos->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $employmentinfo = $arr[0] : $employmentinfo = $this->EmploymentInfos->newEntity();  						
					$employmentinfo = $arr[0];
						$employmentinfo = $this->EmploymentInfos->patchEntity($employmentinfo, $this->request->data['employmentinfo']);
						$employmentinfo['customer_id']=$this->loggedinuser['customer_id'];
            			if ($this->Employees->EmploymentInfos->save($employmentinfo)) {
                			
                		}

					// associated ContactInfos
            		$this->loadModel('ContactInfos');
					$arr = $this->ContactInfos->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $contactinfo = $arr[0] : $contactinfo = $this->ContactInfos->newEntity();  
						$contactinfo = $this->ContactInfos->patchEntity($contactinfo, $this->request->data['contact_info']);
						$contactinfo['employee_id']=$empid;
						$contactinfo['customer_id']=$this->loggedinuser['customer_id'];
            			if ($this->Employees->ContactInfos->save($contactinfo)) {
                			
                		}
						
					// associated Address
            		$this->loadModel('Addresses');
					$arr = $this->Addresses->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $address = $arr[0] : $address = $this->Addresses->newEntity();  
						$address = $this->Addresses->patchEntity($address, $this->request->data['address']);
						$address['employee_id']=$empid;
						$address['customer_id']=$this->loggedinuser['customer_id'];
            			if ($this->Employees->Addresses->save($address)) {
                			
                		}
						
					// associated ids
            		$this->loadModel('Identities');
					$arr = $this->Identities->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $ids = $arr[0] : $ids = $this->Identities->newEntity();  
						$ids = $this->Identities->patchEntity($ids, $this->request->data['identity']);
						$ids['employee_id']=$empid;
						$ids['customer_id']=$this->loggedinuser['customer_id'];
            			if ($this->Employees->Identities->save($ids)) {
                			
                		}
					
				
                $this->Flash->success(__('The profile has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The profile could not be saved. Please, try again.'));
            }
        }
		
		
	}
    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => []
        ]);

        $this->set('profile', $profile);
        $this->set('_serialize', ['profile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profile = $this->Profiles->newEntity();
        if ($this->request->is('post')) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->data);
            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The profile could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('profile'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->data);
            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The profile could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('profile'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profiles->get($id);
        if ($this->Profiles->delete($profile)) {
            $this->Flash->success(__('The profile has been deleted.'));
        } else {
            $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
