<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CorporateAddresses Controller
 *
 * @property \App\Model\Table\CorporateAddressesTable $CorporateAddresses
 */
class CorporateAddressesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $corporateAddresses = $this->paginate($this->CorporateAddresses);

        $this->set(compact('corporateAddresses'));
        $this->set('_serialize', ['corporateAddresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Corporate Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporateAddress = $this->CorporateAddresses->get($id, [
            'contain' => []
        ]);

        $this->set('corporateAddress', $corporateAddress);
        $this->set('_serialize', ['corporateAddress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corporateAddress = $this->CorporateAddresses->newEntity();
        if ($this->request->is('post')) {
            $corporateAddress = $this->CorporateAddresses->patchEntity($corporateAddress, $this->request->data);
            if ($this->CorporateAddresses->save($corporateAddress)) {
                $this->Flash->success(__('The corporate address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The corporate address could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('corporateAddress'));
        $this->set('_serialize', ['corporateAddress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Corporate Address id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corporateAddress = $this->CorporateAddresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporateAddress = $this->CorporateAddresses->patchEntity($corporateAddress, $this->request->data);
            if ($this->CorporateAddresses->save($corporateAddress)) {
                $this->Flash->success(__('The corporate address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The corporate address could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('corporateAddress'));
        $this->set('_serialize', ['corporateAddress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Corporate Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corporateAddress = $this->CorporateAddresses->get($id);
        if ($this->CorporateAddresses->delete($corporateAddress)) {
            $this->Flash->success(__('The corporate address has been deleted.'));
        } else {
            $this->Flash->error(__('The corporate address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
