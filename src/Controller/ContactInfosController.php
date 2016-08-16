<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContactInfos Controller
 *
 * @property \App\Model\Table\ContactInfosTable $ContactInfos
 */
class ContactInfosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $contactInfos = $this->paginate($this->ContactInfos);

        $this->set(compact('contactInfos'));
        $this->set('_serialize', ['contactInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact Info id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactInfo = $this->ContactInfos->get($id, [
            'contain' => []
        ]);

        $this->set('contactInfo', $contactInfo);
        $this->set('_serialize', ['contactInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactInfo = $this->ContactInfos->newEntity();
        if ($this->request->is('post')) {
            $contactInfo = $this->ContactInfos->patchEntity($contactInfo, $this->request->data);
            if ($this->ContactInfos->save($contactInfo)) {
                $this->Flash->success(__('The contact info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contact info could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contactInfo'));
        $this->set('_serialize', ['contactInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Info id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactInfo = $this->ContactInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactInfo = $this->ContactInfos->patchEntity($contactInfo, $this->request->data);
            if ($this->ContactInfos->save($contactInfo)) {
                $this->Flash->success(__('The contact info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contact info could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contactInfo'));
        $this->set('_serialize', ['contactInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactInfo = $this->ContactInfos->get($id);
        if ($this->ContactInfos->delete($contactInfo)) {
            $this->Flash->success(__('The contact info has been deleted.'));
        } else {
            $this->Flash->error(__('The contact info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
