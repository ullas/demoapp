<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Compensation Controller
 *
 * @property \App\Model\Table\CompensationTable $Compensation
 */
class CompensationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $compensation = $this->paginate($this->Compensation);

		$empTable = TableRegistry::get('Employees');
		$payrolldataTable = TableRegistry::get('PayrollData');

		$query=$empTable->find('All')->where(['visible'=>'1','customer_id'=>$this->loggedinuser['customer_id']]);
		(isset($query)) ? $totalempcount=$query->count() : $totalempcount="";
		
		$query=$payrolldataTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']])->distinct(['empdatabiographies_id']);
		(isset($query)) ? $payrollheadcount=$query->count() : $payrollheadcount="";
		  
        $this->set(compact('compensation','totalempcount','payrollheadcount'));
        $this->set('_serialize', ['compensation']);
    }

    /**
     * View method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compensation = $this->Compensation->get($id, [
            'contain' => []
        ]);

        $this->set('compensation', $compensation);
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compensation = $this->Compensation->newEntity();
        if ($this->request->is('post')) {
            $compensation = $this->Compensation->patchEntity($compensation, $this->request->data);
            if ($this->Compensation->save($compensation)) {
                $this->Flash->success(__('The compensation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compensation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('compensation'));
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compensation = $this->Compensation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compensation = $this->Compensation->patchEntity($compensation, $this->request->data);
            if ($this->Compensation->save($compensation)) {
                $this->Flash->success(__('The compensation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The compensation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('compensation'));
        $this->set('_serialize', ['compensation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Compensation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compensation = $this->Compensation->get($id);
        if ($this->Compensation->delete($compensation)) {
            $this->Flash->success(__('The compensation has been deleted.'));
        } else {
            $this->Flash->error(__('The compensation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
