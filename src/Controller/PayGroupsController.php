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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
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
            'contain' => []
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
        $this->set(compact('payGroup'));
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
        $this->set(compact('payGroup'));
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
