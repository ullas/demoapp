<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobInfos Controller
 *
 * @property \App\Model\Table\JobInfosTable $JobInfos
 */
class JobInfosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $jobInfos = $this->paginate($this->JobInfos);

        $this->set(compact('jobInfos'));
        $this->set('_serialize', ['jobInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Info id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobInfo = $this->JobInfos->get($id, [
            'contain' => []
        ]);

        $this->set('jobInfo', $jobInfo);
        $this->set('_serialize', ['jobInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobInfo = $this->JobInfos->newEntity();
        if ($this->request->is('post')) {
            $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jobInfo'));
        $this->set('_serialize', ['jobInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Info id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobInfo = $this->JobInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobInfo = $this->JobInfos->patchEntity($jobInfo, $this->request->data);
            if ($this->JobInfos->save($jobInfo)) {
                $this->Flash->success(__('The job info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job info could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jobInfo'));
        $this->set('_serialize', ['jobInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobInfo = $this->JobInfos->get($id);
        if ($this->JobInfos->delete($jobInfo)) {
            $this->Flash->success(__('The job info has been deleted.'));
        } else {
            $this->Flash->error(__('The job info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
