<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobClasses Controller
 *
 * @property \App\Model\Table\JobClassesTable $JobClasses
 */
class JobClassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PayGrades', 'JobFunctions']
        ];
        $jobClasses = $this->paginate($this->JobClasses);

        $this->set(compact('jobClasses'));
        $this->set('_serialize', ['jobClasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Class id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobClass = $this->JobClasses->get($id, [
            'contain' => ['PayGrades', 'JobFunctions']
        ]);

        $this->set('jobClass', $jobClass);
        $this->set('_serialize', ['jobClass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobClass = $this->JobClasses->newEntity();
        if ($this->request->is('post')) {
            $jobClass = $this->JobClasses->patchEntity($jobClass, $this->request->data);
            if ($this->JobClasses->save($jobClass)) {
                $this->Flash->success(__('The job class has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job class could not be saved. Please, try again.'));
            }
        }
        $payGrades = $this->JobClasses->PayGrades->find('list', ['limit' => 200]);
        $jobFunctions = $this->JobClasses->JobFunctions->find('list', ['limit' => 200]);
        $this->set(compact('jobClass', 'payGrades', 'jobFunctions'));
        $this->set('_serialize', ['jobClass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Class id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobClass = $this->JobClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobClass = $this->JobClasses->patchEntity($jobClass, $this->request->data);
            if ($this->JobClasses->save($jobClass)) {
                $this->Flash->success(__('The job class has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job class could not be saved. Please, try again.'));
            }
        }
        $payGrades = $this->JobClasses->PayGrades->find('list', ['limit' => 200]);
        $jobFunctions = $this->JobClasses->JobFunctions->find('list', ['limit' => 200]);
        $this->set(compact('jobClass', 'payGrades', 'jobFunctions'));
        $this->set('_serialize', ['jobClass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Class id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobClass = $this->JobClasses->get($id);
        if ($this->JobClasses->delete($jobClass)) {
            $this->Flash->success(__('The job class has been deleted.'));
        } else {
            $this->Flash->error(__('The job class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
