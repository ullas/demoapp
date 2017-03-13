<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayRanges Controller
 *
 * @property \App\Model\Table\PayRangesTable $PayRanges
 */
class PayRangesController extends AppController
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
		$contains=['LegalEntities', 'PayGroups', 'Customers'];
									  
		$usrfilter="PayRanges.customer_id ='".$this->loggedinuser['customer_id'] . "'";		  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['LegalEntities', 'PayGroups', 'Customers']
        ];
        $payRanges = $this->paginate($this->PayRanges);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payRanges'));
        $this->set('_serialize', ['payRanges']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Range id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payRange = $this->PayRanges->get($id, [
            'contain' => ['LegalEntities', 'PayGroups', 'Customers']
        ]);
		
		if($payRange['customer_id']==$this->loggedinuser['customer_id']){
 			$legalEntities = $this->PayRanges->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$payGroups = $this->PayRanges->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$customers = $this->PayRanges->Customers->find('list', ['limit' => 200]);
        	$this->set(compact('payRange', 'legalEntities', 'payGroups', 'customers'));
        	$this->set('payRange', $payRange);
        	$this->set('_serialize', ['payRange']);
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
        $payRange = $this->PayRanges->newEntity();
        if ($this->request->is('post')) {
            $payRange = $this->PayRanges->patchEntity($payRange, $this->request->data);
			$payRange['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayRanges->save($payRange)) {
                $this->Flash->success(__('The pay range has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay range could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayRanges->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->PayRanges->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->PayRanges->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payRange', 'legalEntities', 'payGroups', 'customers'));
        $this->set('_serialize', ['payRange']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Range id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payRange = $this->PayRanges->get($id, [
            'contain' => []
        ]);
		
		if($payRange['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payRange = $this->PayRanges->patchEntity($payRange, $this->request->data);
            if ($this->PayRanges->save($payRange)) {
                $this->Flash->success(__('The pay range has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay range could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayRanges->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->PayRanges->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->PayRanges->Customers->find('list', ['limit' => 200]);
        $this->set(compact('payRange', 'legalEntities', 'payGroups', 'customers'));
        $this->set('_serialize', ['payRange']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Range id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payRange = $this->PayRanges->get($id);
        if($payRange['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayRanges->delete($payRange)) {
            	$this->Flash->success(__('The pay range has been deleted.'));
        	} else {
            	$this->Flash->error(__('The pay range could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }
        return $this->redirect(['action' => 'index']);
    }
}
