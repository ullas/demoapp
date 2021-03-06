<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmpDataBiographies Controller
 *
 * @property \App\Model\Table\EmpDataBiographiesTable $EmpDataBiographies
 */
class EmpDataBiographiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Employees', 'Positions']
        ];
        $empDataBiographies = $this->paginate($this->EmpDataBiographies);

        $this->set(compact('empDataBiographies'));
        $this->set('_serialize', ['empDataBiographies']);
    }

    /**
     * View method
     *
     * @param string|null $id Emp Data Biography id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empDataBiography = $this->EmpDataBiographies->get($id, [
            'contain' => ['Customers', 'Employees', 'Positions']
        ]);

        $this->set('empDataBiography', $empDataBiography);
        $this->set('_serialize', ['empDataBiography']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empDataBiography = $this->EmpDataBiographies->newEntity();
        if ($this->request->is('post')) {
            $empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data);
            if ($this->EmpDataBiographies->save($empDataBiography)) {
                $this->Flash->success(__('The emp data biography has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emp data biography could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmpDataBiographies->Customers->find('list', ['limit' => 200]);
        $employees = $this->EmpDataBiographies->Employees->find('list', ['limit' => 200]);
        $positions = $this->EmpDataBiographies->Positions->find('list', ['limit' => 200]);
        $this->set(compact('empDataBiography', 'customers', 'employees', 'positions'));
        $this->set('_serialize', ['empDataBiography']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emp Data Biography id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empDataBiography = $this->EmpDataBiographies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data);
            if ($this->EmpDataBiographies->save($empDataBiography)) {
                $this->Flash->success(__('The emp data biography has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emp data biography could not be saved. Please, try again.'));
            }
        }
        $customers = $this->EmpDataBiographies->Customers->find('list', ['limit' => 200]);
        $employees = $this->EmpDataBiographies->Employees->find('list', ['limit' => 200]);
        $positions = $this->EmpDataBiographies->Positions->find('list', ['limit' => 200]);
        $this->set(compact('empDataBiography', 'customers', 'employees', 'positions'));
        $this->set('_serialize', ['empDataBiography']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emp Data Biography id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empDataBiography = $this->EmpDataBiographies->get($id);
        if ($this->EmpDataBiographies->delete($empDataBiography)) {
            $this->Flash->success(__('The emp data biography has been deleted.'));
        } else {
            $this->Flash->error(__('The emp data biography could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
