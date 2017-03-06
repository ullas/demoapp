<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayComponentGroups Controller
 *
 * @property \App\Model\Table\PayComponentGroupsTable $PayComponentGroups
 */
class PayComponentGroupsController extends AppController
{
var $components = array('Datatable');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		$contains=['Customers'];
									  
		$usrfilter="PayComponentGroups.customer_id ='".$this->loggedinuser['customer_id'] . "'";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
		
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $payComponentGroups = $this->paginate($this->PayComponentGroups);

        $this->set(compact('payComponentGroups'));
        $this->set('_serialize', ['payComponentGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Component Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payComponentGroup = $this->PayComponentGroups->get($id, [
            'contain' => ['Customers', 'TimeAccountTypes']
        ]);
		
		if($payComponentGroup['customer_id']==$this->loggedinuser['customer_id']){
 			$this->set('payComponentGroup', $payComponentGroup);
        	$this->set('_serialize', ['payComponentGroup']);
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
        $payComponentGroup = $this->PayComponentGroups->newEntity();
        if ($this->request->is('post')) {
            $payComponentGroup = $this->PayComponentGroups->patchEntity($payComponentGroup, $this->request->data);
			$payComponentGroup['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayComponentGroups->save($payComponentGroup)) {
                $this->Flash->success(__('The pay component group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component group could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayComponentGroups->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payComponentGroup', 'customers'));
        $this->set('_serialize', ['payComponentGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Component Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payComponentGroup = $this->PayComponentGroups->get($id, [
            'contain' => []
        ]);
		
		if($payComponentGroup['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payComponentGroup = $this->PayComponentGroups->patchEntity($payComponentGroup, $this->request->data);
            if ($this->PayComponentGroups->save($payComponentGroup)) {
                $this->Flash->success(__('The pay component group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component group could not be saved. Please, try again.'));
            }
        }
        $customers = $this->PayComponentGroups->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payComponentGroup', 'customers'));
        $this->set('_serialize', ['payComponentGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Component Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payComponentGroup = $this->PayComponentGroups->get($id);
        if($payComponentGroup['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayComponentGroups->delete($payComponentGroup)) {
            	$this->Flash->success(__('The pay component group has been deleted.'));
        	} else {
            	$this->Flash->error(__('The pay component group could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
}
