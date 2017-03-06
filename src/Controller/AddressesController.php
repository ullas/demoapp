<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 */
class AddressesController extends AppController
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
		
		$contains=['EmpDataBiographies', 'Customers'];
									  
		$usrfilter="";						  
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
            'contain' => ['EmpDataBiographies', 'Customers']
        ];
        $addresses = $this->paginate($this->Addresses);

        $this->set(compact('addresses'));
        $this->set('_serialize', ['addresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => ['EmpDataBiographies', 'Customers']
        ]);
		if($address['customer_id']==$this->loggedinuser['customer_id']){
 			$empDataBiographies = $this->Addresses->EmpDataBiographies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
			$this->set(compact('address', 'empDataBiographies'));
        	// $this->set('address', $address);
        	$this->set('_serialize', ['address']);
 		}else{
		   $this->redirect(['action' => 'logout','controller'=>'users']);
        } 
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $address = $this->Addresses->newEntity();
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->data);
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }
        $empDataBiographies = $this->Addresses->EmpDataBiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Addresses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('address', 'empDataBiographies', 'customers'));
        $this->set('_serialize', ['address']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->data);
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }
        $empDataBiographies = $this->Addresses->EmpDataBiographies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Addresses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('address', 'empDataBiographies', 'customers'));
        $this->set('_serialize', ['address']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);
        if ($this->Addresses->delete($address)) {
            $this->Flash->success(__('The address has been deleted.'));
        } else {
            $this->Flash->error(__('The address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
