<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobclasses Controller
 *
 * @property \App\Model\Table\JobclassesTable $Jobclasses
 */
class JobClassesController extends AppController
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
		$contains=['PayGrades', 'JobFunctions', 'Customers', 'Jobs'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
		
        $this->paginate = [
            'contain' => ['PayGrades', 'JobFunctions', 'Customers', 'Jobs']
        ];
        $jobclasses = $this->paginate($this->JobClasses);

        $this->set(compact('jobclasses'));
        $this->set('_serialize', ['jobclasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Jobclass id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobclass = $this->JobClasses->get($id, [
            'contain' => ['PayGrades', 'JobFunctions', 'Customers', 'Jobs']
        ]);

        $payGrades = $this->JobClasses->PayGrades->find('list', ['limit' => 200]);
        $jobFunctions = $this->JobClasses->JobFunctions->find('list', ['limit' => 200]);
        $customers = $this->JobClasses->Customers->find('list', ['limit' => 200]);
        $jobs = $this->JobClasses->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('jobclass', 'payGrades', 'jobFunctions', 'customers', 'jobs'));
        $this->set('_serialize', ['jobclass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobclass = $this->JobClasses->newEntity();
        if ($this->request->is('post')) {
            $jobclass = $this->Jobclasses->patchEntity($jobclass, $this->request->data);
            if ($this->Jobclasses->save($jobclass)) {
                $this->Flash->success(__('The jobclass has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jobclass could not be saved. Please, try again.'));
            }
        }
        $payGrades = $this->JobClasses->PayGrades->find('list', ['limit' => 200]);
        $jobFunctions = $this->JobClasses->JobFunctions->find('list', ['limit' => 200]);
        $customers = $this->JobClasses->Customers->find('list', ['limit' => 200]);
        $jobs = $this->JobClasses->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('jobclass', 'payGrades', 'jobFunctions', 'customers', 'jobs'));
        $this->set('_serialize', ['jobclass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jobclass id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobclass = $this->JobClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobclass = $this->JobClasses->patchEntity($jobclass, $this->request->data);
            if ($this->Jobclasses->save($jobclass)) {
                $this->Flash->success(__('The jobclass has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jobclass could not be saved. Please, try again.'));
            }
        }
        $payGrades = $this->JobClasses->PayGrades->find('list', ['limit' => 200]);
        $jobFunctions = $this->JobClasses->JobFunctions->find('list', ['limit' => 200]);
        $customers = $this->JobClasses->Customers->find('list', ['limit' => 200]);
        $jobs = $this->JobClasses->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('jobclass', 'payGrades', 'jobFunctions', 'customers', 'jobs'));
        $this->set('_serialize', ['jobclass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jobclass id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobclass = $this->JobClasses->get($id);
        if ($this->JobClasses->delete($jobclass)) {
            $this->Flash->success(__('The jobclass has been deleted.'));
        } else {
            $this->Flash->error(__('The jobclass could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
