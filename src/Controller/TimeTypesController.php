<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeTypes Controller
 *
 * @property \App\Model\Table\TimeTypesTable $TimeTypes
 */
class TimeTypesController extends AppController
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
		
		$contains=['Customers', 'TimeAccountTypes'];
									  
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
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['Customers', 'TimeAccountTypes']
        ];
        $timeTypes = $this->paginate($this->TimeTypes);

        $this->set(compact('timeTypes'));
        $this->set('_serialize', ['timeTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Time Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeType = $this->TimeTypes->get($id, [
            'contain' => ['Customers', 'TimeAccountTypes', 'TimeTypeProfiles']
        ]);

		$timeAccountTypes = $this->TimeTypes->TimeAccountTypes->find('list', ['limit' => 200]);
		$this->set('timeAccountTypes', $timeAccountTypes);	
        $this->set('timeType', $timeType);
        $this->set('_serialize', ['timeType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeType = $this->TimeTypes->newEntity();
        if ($this->request->is('post')) {
            $timeType = $this->TimeTypes->patchEntity($timeType, $this->request->data);
            if ($this->TimeTypes->save($timeType)) {
                $this->Flash->success(__('The time type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time type could not be saved. Please, try again.'));
            }
        }
        $customers = $this->TimeTypes->Customers->find('list', ['limit' => 200]);
        $timeAccountTypes = $this->TimeTypes->TimeAccountTypes->find('list', ['limit' => 200]);
        $this->set(compact('timeType', 'customers', 'timeAccountTypes'));
        $this->set('_serialize', ['timeType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeType = $this->TimeTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeType = $this->TimeTypes->patchEntity($timeType, $this->request->data);
            if ($this->TimeTypes->save($timeType)) {
                $this->Flash->success(__('The time type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time type could not be saved. Please, try again.'));
            }
        }
        $customers = $this->TimeTypes->Customers->find('list', ['limit' => 200]);
        $timeAccountTypes = $this->TimeTypes->TimeAccountTypes->find('list', ['limit' => 200]);
        $this->set(compact('timeType', 'customers', 'timeAccountTypes'));
        $this->set('_serialize', ['timeType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeType = $this->TimeTypes->get($id);
        if ($this->TimeTypes->delete($timeType)) {
            $this->Flash->success(__('The time type has been deleted.'));
        } else {
            $this->Flash->error(__('The time type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
