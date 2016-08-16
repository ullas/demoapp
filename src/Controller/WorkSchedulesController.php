<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WorkSchedules Controller
 *
 * @property \App\Model\Table\WorkSchedulesTable $WorkSchedules
 */
class WorkSchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $workSchedules = $this->paginate($this->WorkSchedules);

        $this->set(compact('workSchedules'));
        $this->set('_serialize', ['workSchedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workSchedule = $this->WorkSchedules->get($id, [
            'contain' => []
        ]);

        $this->set('workSchedule', $workSchedule);
        $this->set('_serialize', ['workSchedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workSchedule = $this->WorkSchedules->newEntity();
        if ($this->request->is('post')) {
            $workSchedule = $this->WorkSchedules->patchEntity($workSchedule, $this->request->data);
            if ($this->WorkSchedules->save($workSchedule)) {
                $this->Flash->success(__('The work schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The work schedule could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('workSchedule'));
        $this->set('_serialize', ['workSchedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workSchedule = $this->WorkSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workSchedule = $this->WorkSchedules->patchEntity($workSchedule, $this->request->data);
            if ($this->WorkSchedules->save($workSchedule)) {
                $this->Flash->success(__('The work schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The work schedule could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('workSchedule'));
        $this->set('_serialize', ['workSchedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workSchedule = $this->WorkSchedules->get($id);
        if ($this->WorkSchedules->delete($workSchedule)) {
            $this->Flash->success(__('The work schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The work schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
