<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayGroups Controller
 *
 * @property \App\Model\Table\PayGroupsTable $PayGroups
 */
class PayGroupsController extends AppController
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
            'contain' => ['Customers']
        ];
        $payGroups = $this->paginate($this->PayGroups);

        $this->set(compact('payGroups'));
        $this->set('_serialize', ['payGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payGroup = $this->PayGroups->get($id, [
            'contain' => ['Customers', 'PayRanges']
        ]);

        $this->set('payGroup', $payGroup);
        $this->set('_serialize', ['payGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payGroup = $this->PayGroups->newEntity();
        if ($this->request->is('post')) {
            $payGroup = $this->PayGroups->patchEntity($payGroup, $this->request->data);
            if ($this->PayGroups->save($payGroup)) {
                $this->Flash->success(__('The pay group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay group could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayGroups->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payGroup', 'customers'));
        $this->set('_serialize', ['payGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payGroup = $this->PayGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payGroup = $this->PayGroups->patchEntity($payGroup, $this->request->data);
            if ($this->PayGroups->save($payGroup)) {
                $this->Flash->success(__('The pay group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay group could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayGroups->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payGroup', 'customers'));
        $this->set('_serialize', ['payGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payGroup = $this->PayGroups->get($id);
        if ($this->PayGroups->delete($payGroup)) {
            $this->Flash->success(__('The pay group has been deleted.'));
        } else {
            $this->Flash->error(__('The pay group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
