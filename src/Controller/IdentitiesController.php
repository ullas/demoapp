<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Identities Controller
 *
 * @property \App\Model\Table\IdentitiesTable $Identities
 */
class IdentitiesController extends AppController
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
        $identities = $this->paginate($this->Identities);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('identities'));
        $this->set('_serialize', ['identities']);
    }

    /**
     * View method
     *
     * @param string|null $id Identity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $identity = $this->Identities->get($id, [
            'contain' => ['Customers', 'Employees']
        ]);

        $this->set('identity', $identity);
        $this->set('_serialize', ['identity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $identity = $this->Identities->newEntity();
        if ($this->request->is('post')) {
            $identity = $this->Identities->patchEntity($identity, $this->request->data);
            if ($this->Identities->save($identity)) {
                $this->Flash->success(__('The identity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The identity could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Identities->Customers->find('list', ['limit' => 200]);
        $employees = $this->Identities->Employees->find('list', ['limit' => 200]);
        $this->set(compact('identity', 'customers', 'employees'));
        $this->set('_serialize', ['identity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Identity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $identity = $this->Identities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $identity = $this->Identities->patchEntity($identity, $this->request->data);
            if ($this->Identities->save($identity)) {
                $this->Flash->success(__('The identity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The identity could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Identities->Customers->find('list', ['limit' => 200]);
        $employees = $this->Identities->Employees->find('list', ['limit' => 200]);
        $this->set(compact('identity', 'customers', 'employees'));
        $this->set('_serialize', ['identity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Identity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $identity = $this->Identities->get($id);
        if ($this->Identities->delete($identity)) {
            $this->Flash->success(__('The identity has been deleted.'));
        } else {
            $this->Flash->error(__('The identity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Identities->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Identities->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Identities has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Identities could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
