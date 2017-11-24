<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupervisorLevels Controller
 *
 * @property \App\Model\Table\SupervisorLevelsTable $SupervisorLevels
 */
class SupervisorLevelsController extends AppController
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
									  
		$usrfilter="SupervisorLevels.customer_id ='".$this->loggedinuser['customer_id'] . "'";								  
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
        $supervisorLevels = $this->paginate($this->SupervisorLevels);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('supervisorLevels'));
        $this->set('_serialize', ['supervisorLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Supervisor Level id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supervisorLevel = $this->SupervisorLevels->get($id, [
            'contain' => ['Customers']
        ]);
		
		if($supervisorLevel['customer_id']==$this->loggedinuser['customer_id'])
		{
        	$this->set('supervisorLevel', $supervisorLevel);
        	$this->set('_serialize', ['supervisorLevel']);
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
        $supervisorLevel = $this->SupervisorLevels->newEntity();
        if ($this->request->is('post')) {
            $supervisorLevel = $this->SupervisorLevels->patchEntity($supervisorLevel, $this->request->data);
            $supervisorLevel['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->SupervisorLevels->save($supervisorLevel)) {
                $this->Flash->success(__('The supervisor level has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supervisor level could not be saved. Please, try again.'));
            }
        }
        $customers = $this->SupervisorLevels->Customers->find('list', ['limit' => 200]);
        $this->set(compact('supervisorLevel', 'customers'));
        $this->set('_serialize', ['supervisorLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supervisor Level id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supervisorLevel = $this->SupervisorLevels->get($id, [
            'contain' => []
        ]);
		
		if($supervisorLevel['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supervisorLevel = $this->SupervisorLevels->patchEntity($supervisorLevel, $this->request->data);
            if ($this->SupervisorLevels->save($supervisorLevel)) {
                $this->Flash->success(__('The supervisor level has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supervisor level could not be saved. Please, try again.'));
            }
        }
        $customers = $this->SupervisorLevels->Customers->find('list', ['limit' => 200]);
        $this->set(compact('supervisorLevel', 'customers'));
        $this->set('_serialize', ['supervisorLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supervisor Level id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supervisorLevel = $this->SupervisorLevels->get($id);
		if($supervisorLevel['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->SupervisorLevels->delete($supervisorLevel)) {
           	 	$this->Flash->success(__('The supervisor level has been deleted.'));
        	} else {
            	$this->Flash->error(__('The supervisor level could not be deleted. Please, try again.'));
        	}
		}else
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
			    	
					$record = $this->SupervisorLevels->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->SupervisorLevels->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected supervisor levels has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The supervisor levels could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
