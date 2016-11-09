<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 */
class JobsController extends AppController
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
		$contains=['Jobclasses', 'Jobfunctions', 'Jobinfos'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['Jobclasses', 'Jobfunctions', 'Jobinfos']
        ];
        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
        $this->set('_serialize', ['jobs']);
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Jobclasses', 'Jobfunctions', 'Jobinfos']
        ]);

        $this->set('job', $job);
		
		$jobFunctions = $this->Jobs->JobFunctions->find('list', ['limit' => 200]);
		$payGrades =TableRegistry::get('PayGrades')->find('list', ['limit' => 200]);
		$this->set(compact( 'jobFunctions','payGrades'));
		
		$this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data,['associated' => ['Jobclasses', 'Jobfunctions', 'Jobinfos']]);
			$job['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        $jobClasses = $this->Jobs->JobClasses->find('list', ['limit' => 200]);
        $jobFunctions = $this->Jobs->JobFunctions->find('list', ['limit' => 200]);
        $jobInfos = $this->Jobs->JobInfos->find('list', ['limit' => 200]);
		$payGrades =TableRegistry::get('PayGrades')->find('list', ['limit' => 200]);
        $this->set(compact('job', 'jobClasses', 'jobFunctions', 'jobInfos','payGrades'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Jobclasses', 'Jobfunctions', 'Jobinfos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
			$job['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));debug($this->request->data);

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        $jobClasses = $this->Jobs->JobClasses->find('list', ['limit' => 200]);
        $jobFunctions = $this->Jobs->JobFunctions->find('list', ['limit' => 200]);
        $jobInfos = $this->Jobs->JobInfos->find('list', ['limit' => 200]);
		$payGrades =TableRegistry::get('PayGrades')->find('list', ['limit' => 200]);
        $this->set(compact('job', 'jobClasses', 'jobFunctions', 'jobInfos','payGrades'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
