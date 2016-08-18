<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ids Controller
 *
 * @property \App\Model\Table\IdsTable $Ids
 */
class IdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ids = $this->paginate($this->Ids);

        $this->set(compact('ids'));
        $this->set('_serialize', ['ids']);
    }

    /**
     * View method
     *
     * @param string|null $id Id id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $id = $this->Ids->get($id, [
            'contain' => []
        ]);

        $this->set('id', $id);
        $this->set('_serialize', ['id']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $id = $this->Ids->newEntity();
        if ($this->request->is('post')) {
            $id = $this->Ids->patchEntity($id, $this->request->data);
            if ($this->Ids->save($id)) {
                $this->Flash->success(__('The id has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The id could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('id'));
        $this->set('_serialize', ['id']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Id id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $id = $this->Ids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $id = $this->Ids->patchEntity($id, $this->request->data);
            if ($this->Ids->save($id)) {
                $this->Flash->success(__('The id has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The id could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('id'));
        $this->set('_serialize', ['id']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Id id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->Ids->get($id);
        if ($this->Ids->delete($id)) {
            $this->Flash->success(__('The id has been deleted.'));
        } else {
            $this->Flash->error(__('The id could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
