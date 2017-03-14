<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Picklists Controller
 *
 * @property \App\Model\Table\PicklistsTable $Picklists
 */
class PicklistsController extends AppController
{
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'id','type'=>'int'),
									  'description','comments','external_code');
									  
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
            'contain' => ['Customers']
        ];
        $picklists = $this->paginate($this->Picklists);

        $this->set(compact('picklists'));
        $this->set('_serialize', ['picklists']);
    }

    /**
     * View method
     *
     * @param string|null $id Picklist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $picklist = $this->Picklists->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('picklist', $picklist);
        $this->set('_serialize', ['picklist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $picklist = $this->Picklists->newEntity();
        if ($this->request->is('post')) {
            $picklist = $this->Picklists->patchEntity($picklist, $this->request->data);
            if ($this->Picklists->save($picklist)) {
                $this->Flash->success(__('The picklist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The picklist could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Picklists->Customers->find('list', ['limit' => 200]);
        $this->set(compact('picklist', 'customers'));
        $this->set('_serialize', ['picklist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Picklist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $picklist = $this->Picklists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $picklist = $this->Picklists->patchEntity($picklist, $this->request->data);
            if ($this->Picklists->save($picklist)) {
                $this->Flash->success(__('The picklist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The picklist could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Picklists->Customers->find('list', ['limit' => 200]);
        $this->set(compact('picklist', 'customers'));
        $this->set('_serialize', ['picklist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Picklist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $picklist = $this->Picklists->get($id);
        if ($this->Picklists->delete($picklist)) {
            $this->Flash->success(__('The picklist has been deleted.'));
        } else {
            $this->Flash->error(__('The picklist could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Picklists->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Picklists->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Picklists has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Picklists could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
