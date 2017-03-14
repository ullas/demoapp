<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeAccountTypes Controller
 *
 * @property \App\Model\Table\TimeAccountTypesTable $TimeAccountTypes
 */
class TimeAccountTypesController extends AppController
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
		
		$contains=['PayComponents', 'PayComponentGroups', 'Customers'];
									  
		$usrfilter="TimeAccountTypes.customer_id ='".$this->loggedinuser['customer_id'] . "'";				  
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
            'contain' => ['PayComponents', 'PayComponentGroups', 'Customers']
        ];
        $timeAccountTypes = $this->paginate($this->TimeAccountTypes);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('timeAccountTypes'));
        $this->set('_serialize', ['timeAccountTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeAccountType = $this->TimeAccountTypes->get($id, [
            'contain' => ['PayComponents', 'PayComponentGroups', 'Customers', 'TimeTypes']
        ]);
		
		$payComponents = $this->TimeAccountTypes->PayComponents->find('list', ['limit' => 200]);
		$this->set('payComponents', $payComponents);
		$payComponentGroups = $this->TimeAccountTypes->PayComponentGroups->find('list', ['limit' => 200]);
		if($timeAccountType['customer_id']==$this->loggedinuser['customer_id'])
		{
			$this->set('payComponentGroups', $payComponentGroups);

        	$this->set('timeAccountType', $timeAccountType);
        	$this->set('_serialize', ['timeAccountType']);
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
        $timeAccountType = $this->TimeAccountTypes->newEntity();
        if ($this->request->is('post')) {
            $timeAccountType = $this->TimeAccountTypes->patchEntity($timeAccountType, $this->request->data);
			$timeAccountType['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->TimeAccountTypes->save($timeAccountType)) {
                $this->Flash->success(__('The time account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time account type could not be saved. Please, try again.'));
            }
        }
        $payComponents = $this->TimeAccountTypes->PayComponents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponentGroups = $this->TimeAccountTypes->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->TimeAccountTypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('timeAccountType', 'payComponents', 'payComponentGroups', 'customers'));
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeAccountType = $this->TimeAccountTypes->get($id, [
            'contain' => []
        ]);
		
		if($timeAccountType['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeAccountType = $this->TimeAccountTypes->patchEntity($timeAccountType, $this->request->data);
            if ($this->TimeAccountTypes->save($timeAccountType)) {
                $this->Flash->success(__('The time account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The time account type could not be saved. Please, try again.'));
            }
        }
        $payComponents = $this->TimeAccountTypes->PayComponents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponentGroups = $this->TimeAccountTypes->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->TimeAccountTypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('timeAccountType', 'payComponents', 'payComponentGroups', 'customers'));
        $this->set('_serialize', ['timeAccountType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Account Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeAccountType = $this->TimeAccountTypes->get($id);
        if($timeAccountType['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->TimeAccountTypes->delete($timeAccountType)) {
            	$this->Flash->success(__('The time account type has been deleted.'));
        	} else {
            	$this->Flash->error(__('The time account type could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
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
			    	
					$record = $this->TimeAccountTypes->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->TimeAccountTypes->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected TimeAccountTypes has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The TimeAccountTypes could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
