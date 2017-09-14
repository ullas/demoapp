<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobInfos Controller
 *
 * @property \App\Model\Table\JobInfosTable $JobInfos
 */
class JobInfosController extends AppController
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
		$contains=['Users', 'Customers', 'Jobs', 'Positions'];
									  
		$usrfilter="JobInfos.customer_id ='".$this->loggedinuser['customer_id'] . "'";							  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
		
        $this->paginate = [
            'contain' => ['Users', 'Customers', 'Jobs', 'Positions', 'BusinessUnits', 'Divisions', 'CostCentres', 'PayGrades', 'Locations', 'Departments', 'LegalEntities']
        ];
        $jobInfos = $this->paginate($this->JobInfos);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('jobInfos'));
        $this->set('_serialize', ['jobInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Info id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobInfo = $this->JobInfos->get($id, [
            'contain' => ['Users', 'Customers', 'Jobs', 'Positions', 'BusinessUnits', 'Divisions', 'CostCentres', 'PayGrades', 'Locations', 'Departments', 'LegalEntities']
        ]);

		$positions = $this->JobInfos->Positions->find('list', ['limit' => 200]);
        $this->set(compact('positions',$positions));
		if($jobInfo['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('jobInfo', $jobInfo);
        	$this->set('_serialize', ['jobInfo']);
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
        $jobInfo = $this->JobInfos->newEntity();
        if ($this->request->is('post')) {
            $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
			$jobInfo['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
        $users = $this->JobInfos->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
        $jobs = $this->JobInfos->Jobs->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $positions = $this->JobInfos->Positions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->JobInfos->Divisions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->JobInfos->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->JobInfos->Departments->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $legalEntities = $this->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidayCalendars = $this->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$workSchedules = $this->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$timeTypeProfiles = $this->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('jobInfo', 'users', 'customers', 'jobs', 'positions', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));
        $this->set('_serialize', ['jobInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Info id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobInfo = $this->JobInfos->get($id, [
            'contain' => []
        ]);
		
		if($jobInfo['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
        $users = $this->JobInfos->Users->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
        $jobs = $this->JobInfos->Jobs->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $positions = $this->JobInfos->Positions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->JobInfos->Divisions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->JobInfos->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->JobInfos->Departments->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $legalEntities = $this->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidayCalendars = $this->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$workSchedules = $this->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$timeTypeProfiles = $this->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('jobInfo', 'users', 'customers', 'jobs', 'positions', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));
        $this->set('_serialize', ['jobInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobInfo = $this->JobInfos->get($id);
        if($jobInfo['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->JobInfos->delete($jobInfo)) {
            	$this->Flash->success(__('The job info has been deleted.'));
        	} else {
            	$this->Flash->error(__('The job info could not be deleted. Please, try again.'));
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
			    	
					$record = $this->JobInfos->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->JobInfos->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected JobInfos has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The JobInfos could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
