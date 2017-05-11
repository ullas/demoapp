<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Experiences Controller
 *
 * @property \App\Model\Table\ExperiencesTable $Experiences
 */
class ExperiencesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Customers']
        ];
        $experiences = $this->paginate($this->Experiences);

        $this->set(compact('experiences'));
        $this->set('_serialize', ['experiences']);
    }

    /**
     * View method
     *
     * @param string|null $id Experience id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $experience = $this->Experiences->get($id, [
            'contain' => ['Employees', 'Customers']
        ]);

        $this->set('experience', $experience);
        $this->set('_serialize', ['experience']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $experience = $this->Experiences->newEntity();
        if ($this->request->is('post')) {
            $experience = $this->Experiences->patchEntity($experience, $this->request->data);
            if ($this->Experiences->save($experience)) {
                $this->Flash->success(__('The experience has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The experience could not be saved. Please, try again.'));
            }
        }
        $employees = $this->Experiences->Employees->find('list', ['limit' => 200]);
        $customers = $this->Experiences->Customers->find('list', ['limit' => 200]);
        $this->set(compact('experience', 'employees', 'customers'));
        $this->set('_serialize', ['experience']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Experience id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $experience = $this->Experiences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $experience = $this->Experiences->patchEntity($experience, $this->request->data);
            if ($this->Experiences->save($experience)) {
                $this->Flash->success(__('The experience has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The experience could not be saved. Please, try again.'));
            }
        }
        $employees = $this->Experiences->Employees->find('list', ['limit' => 200]);
        $customers = $this->Experiences->Customers->find('list', ['limit' => 200]);
        $this->set(compact('experience', 'employees', 'customers'));
        $this->set('_serialize', ['experience']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Experience id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $experience = $this->Experiences->get($id);
        if ($this->Experiences->delete($experience)) {
            $this->Flash->success(__('The experience has been deleted.'));
        } else {
            $this->Flash->error(__('The experience could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
