<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobinfos Controller
 *
 * @property \App\Model\Table\JobinfosTable $Jobinfos
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
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
		
        $this->paginate = [
            'contain' => ['Users', 'Customers', 'Jobs', 'Positions']
        ];
        $jobinfos = $this->paginate($this->JobInfos);

        $this->set(compact('jobinfos'));
        $this->set('_serialize', ['jobinfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Jobinfo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobinfo = $this->JobInfos->get($id, [
            'contain' => ['Users', 'Customers', 'Jobs', 'Positions']
        ]);
		$positions = $this->JobInfos->Positions->find('list', ['limit' => 200]);
        $this->set(compact('jobinfo','positions'));
        $this->set('jobinfo', $jobinfo);
        $this->set('_serialize', ['jobinfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobinfo = $this->JobInfos->newEntity();
        if ($this->request->is('post')) {
            $jobinfo = $this->JobInfos->patchEntity($jobinfo, $this->request->data);
            if ($this->Jobinfos->save($jobinfo)) {
                $this->Flash->success(__('The jobinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jobinfo could not be saved. Please, try again.'));
            }
        }
		
		$costCentres = $this->JobInfos->CostCentres->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$payGrades = $this->JobInfos->PayGrades->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$legalEntities = $this->JobInfos->LegalEntities->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$businessUnits = $this->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$divisions = $this->JobInfos->Divisions->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$departments = $this->JobInfos->Departments->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		$locations = $this->JobInfos->Locations->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $users = $this->JobInfos->Users->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $customers = $this->JobInfos->Customers->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $jobs = $this->JobInfos->Jobs->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $positions = $this->JobInfos->Positions->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $this->set(compact('jobinfo', 'users', 'customers', 'jobs', 'positions','costCentres','payGrades','legalEntities','businessUnits','divisions','departments','locations'));
        $this->set('_serialize', ['jobinfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jobinfo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobinfo = $this->JobInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobinfo = $this->JobInfos->patchEntity($jobinfo, $this->request->data);
            if ($this->Jobinfos->save($jobinfo)) {
                $this->Flash->success(__('The jobinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jobinfo could not be saved. Please, try again.'));
            }
        }
        $users = $this->JobInfos->Users->find('list', ['limit' => 200]);
        $customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
        $jobs = $this->JobInfos->Jobs->find('list', ['limit' => 200]);
        $positions = $this->JobInfos->Positions->find('list', ['limit' => 200]);
        $this->set(compact('jobinfo', 'users', 'customers', 'jobs', 'positions'));
        $this->set('_serialize', ['jobinfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jobinfo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobinfo = $this->Jobinfos->get($id);
        if ($this->Jobinfos->delete($jobinfo)) {
            $this->Flash->success(__('The jobinfo has been deleted.'));
        } else {
            $this->Flash->error(__('The jobinfo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
