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
	
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		$contains=['Users', 'EmpDataBiographies', 'Customers'];
									  
		$output =$this->Datatable->getView($fields,$contains);
		echo json_encode($output);			
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'EmpDataBiographies', 'Customers']
        ];
        $jobInfos = $this->paginate($this->JobInfos);

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
            'contain' => ['Users', 'EmpDataBiographies', 'Customers']
        ]);

        $this->set('jobInfo', $jobInfo);
        $this->set('_serialize', ['jobInfo']);
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
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
        $users = $this->JobInfos->Users->find('list', ['limit' => 200]);
        $empDataBiographies = $this->JobInfos->EmpDataBiographies->find('list', ['limit' => 200]);
        $customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
        $this->set(compact('jobInfo', 'users', 'empDataBiographies', 'customers'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
        $users = $this->JobInfos->Users->find('list', ['limit' => 200]);
        $empDataBiographies = $this->JobInfos->EmpDataBiographies->find('list', ['limit' => 200]);
        $customers = $this->JobInfos->Customers->find('list', ['limit' => 200]);
        $this->set(compact('jobInfo', 'users', 'empDataBiographies', 'customers'));
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
        if ($this->JobInfos->delete($jobInfo)) {
            $this->Flash->success(__('The job info has been deleted.'));
        } else {
            $this->Flash->error(__('The job info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
