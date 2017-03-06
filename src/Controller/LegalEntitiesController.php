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
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		$this->set('fields', $fields);
		
		$contains=[];
									  
		$usrfilter="LegalEntities.customer_id ='".$this->loggedinuser['customer_id'] . "'";					  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
    	
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

        if($legalEntity['customer_id']==$this->loggedinuser['customer_id']){
       	    $this->set('legalEntity', $legalEntity);
			$locations = $this->LegalEntities->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$customers = $this->LegalEntities->Customers->find('list', ['limit' => 200]);
        	$this->set(compact('legalEntity', 'locations', 'payGroups'));
		
       }else{
		    $this->Flash->error(__('You are not Authorized.'));
			return $this->redirect(['action' => 'index']);
       }    
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
        $locations = $this->LegalEntities->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
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
        $locations = $this->LegalEntities->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
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
		
		if($legalEntity['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $legalEntity = $this->LegalEntities->patchEntity($legalEntity, $this->request->data);
            if ($this->LegalEntities->save($legalEntity)) {
                $this->Flash->success(__('The legal entity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The legal entity could not be saved. Please, try again.'));
            }
        }
        $locations = $this->LegalEntities->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->LegalEntities->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
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
        if($legalEntity['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->LegalEntities->delete($legalEntity)) {
            	$this->Flash->success(__('The legal entity has been deleted.'));
        	} else {
            	$this->Flash->error(__('The legal entity could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
}
