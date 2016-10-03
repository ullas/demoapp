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
	var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),'name','description',array('name'=>'effective_status','type'=>'bool'),
									  array('name'=>'effective_start_date','type'=>'date'),array('name'=>'effective_end_date','type'=>'date'),
									  'country_of_registration ',array('name'=>'standard_weekly_hours ','type'=>'numeric'),'currency','official_language',
									  'external_code',array('name'=>'location_id','type'=>'bigint'),array('name'=>'paygroup_id','type'=>'integer'));
									  
		$output =$this->Datatable->getView($fields);
		echo json_encode($output);			
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'PayGroups', 'Customers']
        ];
        $legalEntities = $this->paginate($this->LegalEntities);

        $this->set(compact('legalEntities'));
        $this->set('_serialize', ['legalEntities']);
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
            'contain' => ['Locations', 'PayGroups', 'Customers', 'PayRanges']
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
            $legalEntity['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->LegalEntities->save($legalEntity)) {
                $this->Flash->success(__('The legal entity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The legal entity could not be saved. Please, try again.'));
            }
        }
        $locations = $this->LegalEntities->Locations->find('list', ['limit' => 200]);
        $payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200]);
        $customers = $this->LegalEntities->Customers->find('list', ['limit' => 200]);
        $this->set(compact('legalEntity', 'locations', 'payGroups', 'customers'));
        $this->set('_serialize', ['legalEntity']);
    }
	
	public function addwizard()
    {
        $legalEntity = $this->LegalEntities->newEntity();
        if ($this->request->is('post')) {
            $legalEntity = $this->LegalEntities->patchEntity($legalEntity, $this->request->data);
			$legalEntity['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->LegalEntities->save($legalEntity)) {
                $this->Flash->success(__('The legal entity has been saved.'));
				return $this->redirect(array('controller' => 'BusinessUnits', 'action' => 'addwizard'));
            } else {
                $this->Flash->error(__('The legal entity could not be saved. Please, try again.')); 
            }

        }
        $locations = $this->LegalEntities->Locations->find('list', ['limit' => 200]);
        $payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200]);
        $customers = $this->LegalEntities->Customers->find('list', ['limit' => 200]);
        $this->set(compact('legalEntity', 'locations', 'payGroups', 'customers'));
        $this->set('_serialize', ['legalEntity']);
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
        $customers = $this->LegalEntities->Customers->find('list', ['limit' => 200]);
        $this->set(compact('legalEntity', 'locations', 'payGroups', 'customers'));
        $this->set('_serialize', ['legalEntity']);
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
