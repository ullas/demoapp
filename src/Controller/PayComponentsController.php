<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayComponents Controller
 *
 * @property \App\Model\Table\PayComponentsTable $PayComponents
 */
class PayComponentsController extends AppController
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
		$contains=['Frequencies', 'Customers'];
									  
		$usrfilter="PayComponents.customer_id ='".$this->loggedinuser['customer_id'] . "'";	  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);
        $this->paginate = [
            'contain' => ['Frequencies', 'Customers']
        ];
        $payComponents = $this->paginate($this->PayComponents);

        $this->set(compact('payComponents'));
        $this->set('_serialize', ['payComponents']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Component id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payComponent = $this->PayComponents->get($id, [
            'contain' => ['Frequencies', 'Customers', 'TimeAccountTypes']
        ]);
		
		if($payComponent['customer_id']==$this->loggedinuser['customer_id']){
 			$frequencies = $this->PayComponents->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
			$payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$this->set(compact('payComponent', 'frequencies', 'customers','payComponentGroups'));
        	$this->set('_serialize', ['payComponent']);
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
        $payComponent = $this->PayComponents->newEntity();
        if ($this->request->is('post')) {
            $payComponent = $this->PayComponents->patchEntity($payComponent, $this->request->data);
			$payComponent['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayComponents->save($payComponent)) {
                $this->Flash->success(__('The pay component has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component could not be saved. Please, try again.'));
            }
        }
        $frequencies = $this->PayComponents->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->PayComponents->Customers->find('list', ['limit' => 200]);
		$payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payComponent', 'frequencies', 'customers','payComponentGroups'));
        $this->set('_serialize', ['payComponent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Component id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payComponent = $this->PayComponents->get($id, [
            'contain' => []
        ]);
		
		if($payComponent['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payComponent = $this->PayComponents->patchEntity($payComponent, $this->request->data);
            if ($this->PayComponents->save($payComponent)) {
                $this->Flash->success(__('The pay component has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay component could not be saved. Please, try again.'));
            }
        }
        $frequencies = $this->PayComponents->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->PayComponents->Customers->find('list', ['limit' => 200]);
        $payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payComponent', 'frequencies', 'customers','payComponentGroups'));
        $this->set('_serialize', ['payComponent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Component id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payComponent = $this->PayComponents->get($id);
        if($payComponent['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayComponents->delete($payComponent)) {
            	$this->Flash->success(__('The pay component has been deleted.'));
        	} else {
            	$this->Flash->error(__('The pay component could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
}
