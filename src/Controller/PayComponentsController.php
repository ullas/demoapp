<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayComponents Controller
 *
 * @property \App\Model\Table\PayComponentsTable $PayComponents
 */
class PayComponentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Frequencies']
        ];
        $payComponents = $this->paginate($this->PayComponents);

        $this->set(compact('payComponents'));
        $this->set('_serialize', ['payComponents']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Component id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payComponent = $this->PayComponents->get($id, [
            'contain' => ['Frequencies']
        ]);

        $this->set('payComponent', $payComponent);
        $this->set('_serialize', ['payComponent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payComponent = $this->PayComponents->newEntity();
        if ($this->request->is('post')) {
            $payComponent = $this->PayComponents->patchEntity($payComponent, $this->request->data);
            if ($this->PayComponents->save($payComponent)) {
                $this->Flash->success(__('The pay component has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component could not be saved. Please, try again.'));
            }
        }
        $frequencies = $this->PayComponents->Frequencies->find('list', ['limit' => 200]);
        $this->set(compact('payComponent', 'frequencies'));
        $this->set('_serialize', ['payComponent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Component id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payComponent = $this->PayComponents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payComponent = $this->PayComponents->patchEntity($payComponent, $this->request->data);
            if ($this->PayComponents->save($payComponent)) {
                $this->Flash->success(__('The pay component has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component could not be saved. Please, try again.'));
            }
        }
        $frequencies = $this->PayComponents->Frequencies->find('list', ['limit' => 200]);
        $this->set(compact('payComponent', 'frequencies'));
        $this->set('_serialize', ['payComponent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Component id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payComponent = $this->PayComponents->get($id);
        if ($this->PayComponents->delete($payComponent)) {
            $this->Flash->success(__('The pay component has been deleted.'));
        } else {
            $this->Flash->error(__('The pay component could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
