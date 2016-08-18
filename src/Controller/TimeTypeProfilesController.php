<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeTypeProfiles Controller
 *
 * @property \App\Model\Table\TimeTypeProfilesTable $TimeTypeProfiles
 */
class TimeTypeProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $timeTypeProfiles = $this->paginate($this->TimeTypeProfiles);

        $this->set(compact('timeTypeProfiles'));
        $this->set('_serialize', ['timeTypeProfiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Time Type Profile id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeTypeProfile = $this->TimeTypeProfiles->get($id, [
            'contain' => []
        ]);

        $this->set('timeTypeProfile', $timeTypeProfile);
        $this->set('_serialize', ['timeTypeProfile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeTypeProfile = $this->TimeTypeProfiles->newEntity();
        if ($this->request->is('post')) {
            $timeTypeProfile = $this->TimeTypeProfiles->patchEntity($timeTypeProfile, $this->request->data);
            if ($this->TimeTypeProfiles->save($timeTypeProfile)) {
                $this->Flash->success(__('The time type profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time type profile could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('timeTypeProfile'));
        $this->set('_serialize', ['timeTypeProfile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Type Profile id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeTypeProfile = $this->TimeTypeProfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeTypeProfile = $this->TimeTypeProfiles->patchEntity($timeTypeProfile, $this->request->data);
            if ($this->TimeTypeProfiles->save($timeTypeProfile)) {
                $this->Flash->success(__('The time type profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time type profile could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('timeTypeProfile'));
        $this->set('_serialize', ['timeTypeProfile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Type Profile id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeTypeProfile = $this->TimeTypeProfiles->get($id);
        if ($this->TimeTypeProfiles->delete($timeTypeProfile)) {
            $this->Flash->success(__('The time type profile has been deleted.'));
        } else {
            $this->Flash->error(__('The time type profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
