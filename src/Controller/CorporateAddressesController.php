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
var $components = array('Datatable');
	
	public function ajaxData() {
		$this->autoRender= False;

		$fields = array(array('name'=>'start_date','type'=>'date'),array('name'=>'end_date','type'=>'date'),'address1','address2','address3','city','country','state','province','zip_code','country');
									  
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
        $corporateAddresses = $this->paginate($this->CorporateAddresses);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
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
            'contain' => ['Customers']
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
        $customers = $this->CorporateAddresses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('corporateAddress', 'customers'));
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
        $customers = $this->CorporateAddresses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('corporateAddress', 'customers'));
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
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->CorporateAddresses->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->CorporateAddresses->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected CorporateAddresses has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The CorporateAddresses could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
