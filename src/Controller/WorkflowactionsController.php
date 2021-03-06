<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workflowactions Controller
 *
 * @property \App\Model\Table\WorkflowactionsTable $Workflowactions
 */
class WorkflowactionsController extends AppController
{

    var $components = array('ActionPopoupDatatable');
	
	public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		
		
		$usrfilter="";
        if( isset($this->request->query['workflowrule']) && ($this->request->query['workflowrule'])!=null ){
        	
			$usrfilter.="workflowrule_id ='" .$this->request->query['workflowrule']. "'";
		}
																	
		$contains= ['Workflowrules', 'Positions', 'Customers'];
		( strlen($usrfilter)>3 ) ? $usrfilter.=" and " : $usrfilter.= "";
			
		$usrfilter.="Workflowactions.customer_id ='".$this->loggedinuser['customer_id'] . "'";								  
		$output =$this->ActionPopoupDatatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);		
    }
	
	public function editStepId()
	{
    	
      	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			foreach(json_decode($this->request->query['content'])  as $d){
    		
				$items="";
    			$items=explode("^",$d);
				$workflowaction = $this->Workflowactions->get($items[0], [
            		'contain' => []
        		]);
            	// $this->request->data['id']=$items[0];
           	 	$this->request->data['stepid']=$items[1];
            	$workflowaction=$this->Workflowactions->patchEntity($workflowaction,$this->request->data);
				if ($this->Workflowactions->save($workflowaction)) {

               	 	// $this->response->body("success");
	    			// return $this->response;
            	} else {
                	// $this->response->body("error");
	    			// return $this->response;
            	}
				
			}
			
		}
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Workflowrules', 'Positions', 'Customers']
        ];
        $workflowactions = $this->paginate($this->Workflowactions);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('workflowactions'));
        $this->set('_serialize', ['workflowactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Workflowaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workflowaction = $this->Workflowactions->get($id, [
            'contain' => ['Workflowrules', 'Positions', 'Customers']
        ]);

		$positions = $this->Workflowactions->Positions->find('list', ['limit' => 200]);
		if($workflowaction['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('positions', $positions);
        	$this->set('workflowaction', $workflowaction);
        	$this->set('_serialize', ['workflowaction']);
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
    	
        $workflowaction = $this->Workflowactions->newEntity();
        if ($this->request->is('post')) {
        		        	
			$query=$this->Workflowactions->find('All')->where(['workflowrule_id'=>$this->request->query['wrid']]);
    		$maxID=$query->select(['maxstepid' => $query->func()->max('stepid')])->toArray();
    		(isset($maxID)) ? $maxstepid=intval($maxID[0]['maxstepid']) : $maxstepid=0;
	
            $workflowaction = $this->Workflowactions->patchEntity($workflowaction, $this->request->data);
			$workflowaction['workflowrule_id'] = $this->request->query['wrid'];
			$workflowaction['customer_id']=$this->loggedinuser['customer_id'];
			$workflowaction['stepid'] = $maxstepid+1;
            if ($this->Workflowactions->save($workflowaction)) {
                $this->Flash->success(__('The workflowaction has been saved.'));

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflowaction could not be saved. Please, try again.'));
            }
			$actionstring = substr($this->referer(), -3);
			if($actionstring==="add"){
				$urlstr = str_replace('add', 'edit/'.$workflowaction['workflowrule_id'] , $this->referer());
				return $this->redirect($urlstr);
			}else{
				return $this->redirect($this->referer());
			}
        }
		
		$positionarr = $this->Workflowactions->find('all')->select(['position_id'])->where(['workflowrule_id'=>$this->request->query['wrid']]);		
        $workflowrules = $this->Workflowactions->Workflowrules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $positions = $this->Workflowactions->Positions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['Positions.id NOT IN'=>$positionarr])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Workflowactions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workflowaction', 'workflowrules', 'positions', 'nextactions', 'onfailureactions', 'customers'));
        $this->set('_serialize', ['workflowaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workflowaction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workflowaction = $this->Workflowactions->get($id, [
            'contain' => []
        ]);
		if($workflowaction['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workflowaction = $this->Workflowactions->patchEntity($workflowaction, $this->request->data);
            if ($this->Workflowactions->save($workflowaction)) {
                $this->Flash->success(__('The workflowaction has been saved.'));

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workflowaction could not be saved. Please, try again.'));
            }
			$actionstring = substr($this->referer(), -3);
			if($actionstring==="add"){
				$urlstr = str_replace('add', 'edit/'.$workflowaction['workflowrule_id'] , $this->referer());
				return $this->redirect($urlstr);
			}else{
				return $this->redirect($this->referer());
			}
        }
        $positionarr = $this->Workflowactions->find('all')->select(['position_id'])->where(['workflowrule_id'=>$workflowaction['workflowrule_id']])->where(['Workflowactions.position_id NOT IN'=>$workflowaction['position_id']]);
		

        $workflowrules = $this->Workflowactions->Workflowrules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $positions = $this->Workflowactions->Positions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['Positions.id NOT IN'=>$positionarr])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->Workflowactions->Customers->find('list', ['limit' => 200]);
        $this->set(compact('workflowaction', 'workflowrules', 'positions', 'nextactions', 'onfailureactions', 'customers'));
        $this->set('_serialize', ['workflowaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workflowaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workflowaction = $this->Workflowactions->get($id);
        if($workflowaction['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->Workflowactions->delete($workflowaction)) {
            	$this->Flash->success(__('The workflowaction has been deleted.'));
        	} else {
            	$this->Flash->error(__('The workflowaction could not be deleted. Please, try again.'));
        	}
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized'));
	    }

        return $this->redirect($this->referer());
    }
	public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Workflowactions->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Workflowactions->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Workflowactions has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Workflowactions could not be deleted. Please, try again.'));
				}
		
		   }
           return $this->redirect($this->referer());
           // return $this->redirect(['action' => 'index']);	
     }
}
