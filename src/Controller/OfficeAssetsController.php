<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OfficeAssets Controller
 *
 * @property \App\Model\Table\OfficeAssetsTable $OfficeAssets
 */
class OfficeAssetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Employees']
        ];
        $officeAssets = $this->paginate($this->OfficeAssets);

        $this->set(compact('officeAssets'));
        $this->set('_serialize', ['officeAssets']);
    }

    /**
     * View method
     *
     * @param string|null $id Office Asset id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $officeAsset = $this->OfficeAssets->get($id, [
            'contain' => ['Customers', 'Employees']
        ]);

        $this->set('officeAsset', $officeAsset);
        $this->set('_serialize', ['officeAsset']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $officeAsset = $this->OfficeAssets->newEntity();
        if ($this->request->is('post')) {
            $officeAsset = $this->OfficeAssets->patchEntity($officeAsset, $this->request->data);
            if ($this->OfficeAssets->save($officeAsset)) {
                $this->Flash->success(__('The office asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office asset could not be saved. Please, try again.'));
            }
        }
        $customers = $this->OfficeAssets->Customers->find('list', ['limit' => 200]);
        $employees = $this->OfficeAssets->Employees->find('list', ['limit' => 200]);
        $this->set(compact('officeAsset', 'customers', 'employees'));
        $this->set('_serialize', ['officeAsset']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office Asset id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $officeAsset = $this->OfficeAssets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officeAsset = $this->OfficeAssets->patchEntity($officeAsset, $this->request->data);
            if ($this->OfficeAssets->save($officeAsset)) {
                $this->Flash->success(__('The office asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office asset could not be saved. Please, try again.'));
            }
        }
        $customers = $this->OfficeAssets->Customers->find('list', ['limit' => 200]);
        $employees = $this->OfficeAssets->Employees->find('list', ['limit' => 200]);
        $this->set(compact('officeAsset', 'customers', 'employees'));
        $this->set('_serialize', ['officeAsset']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office Asset id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officeAsset = $this->OfficeAssets->get($id);
        if ($this->OfficeAssets->delete($officeAsset)) {
            $this->Flash->success(__('The office asset has been deleted.'));
        } else {
            $this->Flash->error(__('The office asset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
