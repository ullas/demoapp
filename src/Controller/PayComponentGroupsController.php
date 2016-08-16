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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
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
            'contain' => []
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
        $this->set(compact('payComponentGroup'));
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
        $this->set(compact('payComponentGroup'));
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
