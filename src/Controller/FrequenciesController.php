<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Frequencies Controller
 *
 * @property \App\Model\Table\FrequenciesTable $Frequencies
 */
class FrequenciesController extends AppController
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
		
		$contains=['Customers'];
									  
		$usrfilter="";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
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
            'contain' => ['Customers']
        ];
        $frequencies = $this->paginate($this->Frequencies);

        $this->set(compact('frequencies'));
        $this->set('_serialize', ['frequencies']);
    }

    /**
     * View method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frequency = $this->Frequencies->get($id, [
            'contain' => ['Customers', 'PayComponents']
        ]);

        $this->set('frequency', $frequency);
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frequency = $this->Frequencies->newEntity();
        if ($this->request->is('post')) {
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->data);
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Frequencies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('frequency', 'customers'));
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frequency = $this->Frequencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->data);
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Frequencies->Customers->find('list', ['limit' => 200]);
        $this->set(compact('frequency', 'customers'));
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frequency = $this->Frequencies->get($id);
        if ($this->Frequencies->delete($frequency)) {
            $this->Flash->success(__('The frequency has been deleted.'));
        } else {
            $this->Flash->error(__('The frequency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
