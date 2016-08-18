<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeAccountTypes Controller
 *
 * @property \App\Model\Table\TimeAccountTypesTable $TimeAccountTypes
 */
class TimeAccountTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $timeAccountTypes = $this->paginate($this->TimeAccountTypes);

        $this->set(compact('timeAccountTypes'));
        $this->set('_serialize', ['timeAccountTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeAccountType = $this->TimeAccountTypes->get($id, [
            'contain' => []
        ]);

        $this->set('timeAccountType', $timeAccountType);
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeAccountType = $this->TimeAccountTypes->newEntity();
        if ($this->request->is('post')) {
            $timeAccountType = $this->TimeAccountTypes->patchEntity($timeAccountType, $this->request->data);
            if ($this->TimeAccountTypes->save($timeAccountType)) {
                $this->Flash->success(__('The time account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time account type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('timeAccountType'));
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeAccountType = $this->TimeAccountTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeAccountType = $this->TimeAccountTypes->patchEntity($timeAccountType, $this->request->data);
            if ($this->TimeAccountTypes->save($timeAccountType)) {
                $this->Flash->success(__('The time account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time account type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('timeAccountType'));
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeAccountType = $this->TimeAccountTypes->get($id);
        if ($this->TimeAccountTypes->delete($timeAccountType)) {
            $this->Flash->success(__('The time account type has been deleted.'));
        } else {
            $this->Flash->error(__('The time account type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
