<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CostCentres Controller
 *
 * @property \App\Model\Table\CostCentresTable $CostCentres
 */
class CostCentresController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),'name','description',array('name'=>'effective_status','type'=>'bool'),
									  array('name'=>'effective_start_date','type'=>'date'),array('name'=>'effective_end_date','type'=>'date'),
									 'parent_cost_center', 'external_code',array('name'=>'cost_center_manager','type'=>'bigint'));
									  
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
        $costCentres = $this->paginate($this->CostCentres);

        $this->set(compact('costCentres'));
        $this->set('_serialize', ['costCentres']);
    }

    /**
     * View method
     *
     * @param string|null $id Cost Centre id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $costCentre = $this->CostCentres->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('costCentre', $costCentre);
        $this->set('_serialize', ['costCentre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $costCentre = $this->CostCentres->newEntity();
        if ($this->request->is('post')) {
            $costCentre = $this->CostCentres->patchEntity($costCentre, $this->request->data);
            if ($this->CostCentres->save($costCentre)) {
                $this->Flash->success(__('The cost centre has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cost centre could not be saved. Please, try again.'));
            }
        }
        $customers = $this->CostCentres->Customers->find('list', ['limit' => 200]);
        $this->set(compact('costCentre', 'customers'));
        $this->set('_serialize', ['costCentre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cost Centre id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $costCentre = $this->CostCentres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $costCentre = $this->CostCentres->patchEntity($costCentre, $this->request->data);
            if ($this->CostCentres->save($costCentre)) {
                $this->Flash->success(__('The cost centre has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cost centre could not be saved. Please, try again.'));
            }
        }
        $customers = $this->CostCentres->Customers->find('list', ['limit' => 200]);
        $this->set(compact('costCentre', 'customers'));
        $this->set('_serialize', ['costCentre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cost Centre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $costCentre = $this->CostCentres->get($id);
        if ($this->CostCentres->delete($costCentre)) {
            $this->Flash->success(__('The cost centre has been deleted.'));
        } else {
            $this->Flash->error(__('The cost centre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
