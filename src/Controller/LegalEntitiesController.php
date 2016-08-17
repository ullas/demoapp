<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LegalEntities Controller
 *
 * @property \App\Model\Table\LegalEntitiesTable $LegalEntities
 */
class LegalEntitiesController extends AppController
{
	public $components = array('LoadCountry');
	
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'PayGroups']
        ];
        $legalEntities = $this->paginate($this->LegalEntities);

        $this->set(compact('legalEntities'));
        $this->set('_serialize', ['legalEntities']);
		
		//load countries array 
		$this->set('countryname',$this->LoadCountry->get_country_name('AF'));
    }

    /**
     * View method
     *
     * @param string|null $id Legal Entity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $legalEntity = $this->LegalEntities->get($id, [
            'contain' => ['Locations', 'PayGroups']
        ]);

        $this->set('legalEntity', $legalEntity);
        $this->set('_serialize', ['legalEntity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $legalEntity = $this->LegalEntities->newEntity();
        if ($this->request->is('post')) {
            $legalEntity = $this->LegalEntities->patchEntity($legalEntity, $this->request->data);
            if ($this->LegalEntities->save($legalEntity)) {
                $this->Flash->success(__('The legal entity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The legal entity could not be saved. Please, try again.'));
            }
        }
        $locations = $this->LegalEntities->Locations->find('list', ['limit' => 200]);
        $payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200]);
        $this->set(compact('legalEntity', 'locations', 'payGroups'));
        $this->set('_serialize', ['legalEntity']);
		//load countries array 
		$this->set('countries',$this->LoadCountry->get_countries());
    }

    /**
     * Edit method
     *
     * @param string|null $id Legal Entity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $legalEntity = $this->LegalEntities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $legalEntity = $this->LegalEntities->patchEntity($legalEntity, $this->request->data);
            if ($this->LegalEntities->save($legalEntity)) {
                $this->Flash->success(__('The legal entity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The legal entity could not be saved. Please, try again.'));
            }
        }
        $locations = $this->LegalEntities->Locations->find('list', ['limit' => 200]);
        $payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200]);
        $this->set(compact('legalEntity', 'locations', 'payGroups'));
        $this->set('_serialize', ['legalEntity']);
		
		//load countries array 
		$this->set('countries',$this->LoadCountry->get_countries());
    }

    /**
     * Delete method
     *
     * @param string|null $id Legal Entity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $legalEntity = $this->LegalEntities->get($id);
        if ($this->LegalEntities->delete($legalEntity)) {
            $this->Flash->success(__('The legal entity has been deleted.'));
        } else {
            $this->Flash->error(__('The legal entity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
