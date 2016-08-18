<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobFunctions Controller
 *
 * @property \App\Model\Table\JobFunctionsTable $JobFunctions
 */
class JobFunctionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $jobFunctions = $this->paginate($this->JobFunctions);

        $this->set(compact('jobFunctions'));
        $this->set('_serialize', ['jobFunctions']);
    }

    /**
     * View method
     *
     * @param string|null $id Job Function id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobFunction = $this->JobFunctions->get($id, [
            'contain' => []
        ]);

        $this->set('jobFunction', $jobFunction);
        $this->set('_serialize', ['jobFunction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobFunction = $this->JobFunctions->newEntity();
        if ($this->request->is('post')) {
            $jobFunction = $this->JobFunctions->patchEntity($jobFunction, $this->request->data);
            if ($this->JobFunctions->save($jobFunction)) {
                $this->Flash->success(__('The job function has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job function could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jobFunction'));
        $this->set('_serialize', ['jobFunction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Function id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobFunction = $this->JobFunctions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobFunction = $this->JobFunctions->patchEntity($jobFunction, $this->request->data);
            if ($this->JobFunctions->save($jobFunction)) {
                $this->Flash->success(__('The job function has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job function could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jobFunction'));
        $this->set('_serialize', ['jobFunction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Function id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobFunction = $this->JobFunctions->get($id);
        if ($this->JobFunctions->delete($jobFunction)) {
            $this->Flash->success(__('The job function has been deleted.'));
        } else {
            $this->Flash->error(__('The job function could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
