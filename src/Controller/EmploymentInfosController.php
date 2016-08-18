<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmploymentInfos Controller
 *
 * @property \App\Model\Table\EmploymentInfosTable $EmploymentInfos
 */
class EmploymentInfosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $employmentInfos = $this->paginate($this->EmploymentInfos);

        $this->set(compact('employmentInfos'));
        $this->set('_serialize', ['employmentInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Employment Info id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employmentInfo = $this->EmploymentInfos->get($id, [
            'contain' => []
        ]);

        $this->set('employmentInfo', $employmentInfo);
        $this->set('_serialize', ['employmentInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employmentInfo = $this->EmploymentInfos->newEntity();
        if ($this->request->is('post')) {
            $employmentInfo = $this->EmploymentInfos->patchEntity($employmentInfo, $this->request->data);
            if ($this->EmploymentInfos->save($employmentInfo)) {
                $this->Flash->success(__('The employment info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employment info could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('employmentInfo'));
        $this->set('_serialize', ['employmentInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employment Info id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employmentInfo = $this->EmploymentInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employmentInfo = $this->EmploymentInfos->patchEntity($employmentInfo, $this->request->data);
            if ($this->EmploymentInfos->save($employmentInfo)) {
                $this->Flash->success(__('The employment info has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employment info could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('employmentInfo'));
        $this->set('_serialize', ['employmentInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employment Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employmentInfo = $this->EmploymentInfos->get($id);
        if ($this->EmploymentInfos->delete($employmentInfo)) {
            $this->Flash->success(__('The employment info has been deleted.'));
        } else {
            $this->Flash->error(__('The employment info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
