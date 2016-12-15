<?php
namespace App\Controller;

use App\Controller\AppController;

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
    	//get empid from session var
		$empid=$this->request->session()->read('sessionuser')['employee_id'];

		$this->loadModel('Employees');
		
		$profiles = $this->Employees->get($empid, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos']
        ]);
		
        $this->set(compact('profiles'));
        $this->set('_serialize', ['profiles']);
		
	
		//get userid from session var
		// $userid=$this->request->session()->read('sessionuser')['id'];
		//loading position and company name from jobinfos
		// $this->loadModel('JobInfos');
		// $jobinfo = $this->JobInfos->find() ->where(['users_id' => $userid]) ->first();
		// $this->set('jobinfo', $jobinfo);
		// print_r($jobinfo);
    }
	public function editprofile()
    {
    	//get empid from session var
		$empid=$this->request->session()->read('sessionuser')['employee_id'];

		$this->loadModel('Employees');
		$employee = $this->Employees->get($empid, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos']
        ]);
		
		
		if ($this->request->is(['patch', 'post', 'put'])) {$this->log($this->request->data);
			$this->loadModel('Employees');
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			
			$this->loadModel('Employees');$this->log($employee);
            if ($this->Employees->save($employee)) {
            		//associated EmpDataBiographies
            		$this->loadModel('EmpDataBiographies');
					$arr = $this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataBiography = $arr[0] : $empDataBiography = $this->EmpDataBiographies->newEntity();  		
						$empDataBiography = $arr[0];
						$empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data['empdatabiography']);
            			if ($this->Employees->EmpDataBiographies->save($empDataBiography)) {
                			
                		}
					
					//associated Empdatapersonals
            		$this->loadModel('EmpDataPersonals');
					$arr = $this->EmpDataPersonals->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataPersonal = $arr[0] : $empDataPersonal = $this->EmpDataPersonals->newEntity();  
						$empDataPersonal = $arr[0];
						$empDataPersonal = $this->EmpDataPersonals->patchEntity($empDataPersonal, $this->request->data['empdatapersonal']);
            			if ($this->Employees->EmpDataPersonals->save($empDataPersonal)) {
                			
                		}

					//associated EmpDataBiographies
            		$this->loadModel('EmploymentInfos');
					$arr = $this->EmploymentInfos->find('all',['conditions' => array('employee_id' => $empid), 'contain' => []])->toArray();
					isset($arr[0]) ? $employmentinfo = $arr[0] : $employmentinfo = $this->EmploymentInfos->newEntity();  						$employmentinfo = $arr[0];
						$employmentinfo = $this->EmploymentInfos->patchEntity($employmentinfo, $this->request->data['employmentinfo']);
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
					
				
                $this->Flash->success(__('The profile has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The profile could not be saved. Please, try again.'));
            }
        }
		
		$this->set(compact('profiles','employee'));
        $this->set('_serialize', ['profiles']);
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
