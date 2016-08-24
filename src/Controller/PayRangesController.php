<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayRanges Controller
 *
 * @property \App\Model\Table\PayRangesTable $PayRanges
 */
class PayRangesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['LegalEntities', 'PayGroups']
        ];
        $payRanges = $this->paginate($this->PayRanges);

        $this->set(compact('payRanges'));
        $this->set('_serialize', ['payRanges']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Range id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payRange = $this->PayRanges->get($id, [
            'contain' => ['LegalEntities', 'PayGroups']
        ]);

        $this->set('payRange', $payRange);
        $this->set('_serialize', ['payRange']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payRange = $this->PayRanges->newEntity();
        if ($this->request->is('post')) {
            $payRange = $this->PayRanges->patchEntity($payRange, $this->request->data);
            if ($this->PayRanges->save($payRange)) {
                $this->Flash->success(__('The pay range has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay range could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayRanges->LegalEntities->find('list', ['limit' => 200]);
        $payGroups = $this->PayRanges->PayGroups->find('list', ['limit' => 200]);
        $this->set(compact('payRange', 'legalEntities', 'payGroups'));
        $this->set('_serialize', ['payRange']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Range id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payRange = $this->PayRanges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payRange = $this->PayRanges->patchEntity($payRange, $this->request->data);
            if ($this->PayRanges->save($payRange)) {
                $this->Flash->success(__('The pay range has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay range could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayRanges->LegalEntities->find('list', ['limit' => 200]);
        $payGroups = $this->PayRanges->PayGroups->find('list', ['limit' => 200]);
        $this->set(compact('payRange', 'legalEntities', 'payGroups'));
        $this->set('_serialize', ['payRange']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Range id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payRange = $this->PayRanges->get($id);
        if ($this->PayRanges->delete($payRange)) {
            $this->Flash->success(__('The pay range has been deleted.'));
        } else {
            $this->Flash->error(__('The pay range could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
