<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobclasses Controller
 *
 * @property \App\Model\Table\JobclassesTable $Jobclasses
 */
class JobclassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PayGrades', 'JobFunctions', 'Customers', 'Jobs']
        ];
        $jobclasses = $this->paginate($this->Jobclasses);

        $this->set(compact('jobclasses'));
        $this->set('_serialize', ['jobclasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Jobclass id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobclass = $this->Jobclasses->get($id, [
            'contain' => ['PayGrades', 'JobFunctions', 'Customers', 'Jobs']
        ]);

        $this->set('jobclass', $jobclass);
        $this->set('_serialize', ['jobclass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobclass = $this->Jobclasses->newEntity();
        if ($this->request->is('post')) {
            $jobclass = $this->Jobclasses->patchEntity($jobclass, $this->request->data);
            if ($this->Jobclasses->save($jobclass)) {
                $this->Flash->success(__('The jobclass has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jobclass could not be saved. Please, try again.'));
            }
        }
        $payGrades = $this->Jobclasses->PayGrades->find('list', ['limit' => 200]);
        $jobFunctions = $this->Jobclasses->JobFunctions->find('list', ['limit' => 200]);
        $customers = $this->Jobclasses->Customers->find('list', ['limit' => 200]);
        $jobs = $this->Jobclasses->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('jobclass', 'payGrades', 'jobFunctions', 'customers', 'jobs'));
        $this->set('_serialize', ['jobclass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jobclass id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobclass = $this->Jobclasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobclass = $this->Jobclasses->patchEntity($jobclass, $this->request->data);
            if ($this->Jobclasses->save($jobclass)) {
                $this->Flash->success(__('The jobclass has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jobclass could not be saved. Please, try again.'));
            }
        }
        $payGrades = $this->Jobclasses->PayGrades->find('list', ['limit' => 200]);
        $jobFunctions = $this->Jobclasses->JobFunctions->find('list', ['limit' => 200]);
        $customers = $this->Jobclasses->Customers->find('list', ['limit' => 200]);
        $jobs = $this->Jobclasses->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('jobclass', 'payGrades', 'jobFunctions', 'customers', 'jobs'));
        $this->set('_serialize', ['jobclass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jobclass id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobclass = $this->Jobclasses->get($id);
        if ($this->Jobclasses->delete($jobclass)) {
            $this->Flash->success(__('The jobclass has been deleted.'));
        } else {
            $this->Flash->error(__('The jobclass could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
