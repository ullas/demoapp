<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayComponentGroups Controller
 *
 * @property \App\Model\Table\PayComponentGroupsTable $PayComponentGroups
 */
class PayComponentGroupsController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),'name','description',array('name'=>'status','type'=>'bool'),
									  array('name'=>'start_date','type'=>'date'),array('name'=>'end_date','type'=>'date'),'currency','show_on_comp_ui','use_for_comparatio_calc','use_for_range_penetration',array('name'=>'sort_order','type'=>'numeric'),array('name'=>'system_defined','type'=>'bool'),'external_code');
									  
		$output =$this->Datatable->getView($fields);
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
        $payComponentGroups = $this->paginate($this->PayComponentGroups);

        $this->set(compact('payComponentGroups'));
        $this->set('_serialize', ['payComponentGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Component Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payComponentGroup = $this->PayComponentGroups->get($id, [
            'contain' => ['Customers', 'TimeAccountTypes']
        ]);

        $this->set('payComponentGroup', $payComponentGroup);
        $this->set('_serialize', ['payComponentGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payComponentGroup = $this->PayComponentGroups->newEntity();
        if ($this->request->is('post')) {
            $payComponentGroup = $this->PayComponentGroups->patchEntity($payComponentGroup, $this->request->data);
            if ($this->PayComponentGroups->save($payComponentGroup)) {
                $this->Flash->success(__('The pay component group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component group could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayComponentGroups->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payComponentGroup', 'customers'));
        $this->set('_serialize', ['payComponentGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Component Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payComponentGroup = $this->PayComponentGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payComponentGroup = $this->PayComponentGroups->patchEntity($payComponentGroup, $this->request->data);
            if ($this->PayComponentGroups->save($payComponentGroup)) {
                $this->Flash->success(__('The pay component group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component group could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayComponentGroups->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payComponentGroup', 'customers'));
        $this->set('_serialize', ['payComponentGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Component Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payComponentGroup = $this->PayComponentGroups->get($id);
        if ($this->PayComponentGroups->delete($payComponentGroup)) {
            $this->Flash->success(__('The pay component group has been deleted.'));
        } else {
            $this->Flash->error(__('The pay component group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
