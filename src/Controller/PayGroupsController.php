<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayGroups Controller
 *
 * @property \App\Model\Table\PayGroupsTable $PayGroups
 */
class PayGroupsController extends AppController
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
									  
		$usrfilter="PayGroups.customer_id ='".$this->loggedinuser['customer_id'] . "'";				  
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
        $payGroups = $this->paginate($this->PayGroups);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payGroups'));
        $this->set('_serialize', ['payGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payGroup = $this->PayGroups->get($id, [
            'contain' => ['Customers', 'PayRanges']
        ]);
		
		if($payGroup['customer_id']==$this->loggedinuser['customer_id']){
			$legalEntities = $this->PayGroups->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$businessUnits = $this->PayGroups->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$divisions = $this->PayGroups->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$locations = $this->PayGroups->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$frequencies = $this->PayGroups->Frequencies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        	$this->set(compact('legalEntities', 'businessUnits', 'divisions', 'locations','payGroup','frequencies'));
        	$this->set('_serialize', ['payGroup']);
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
        $payGroup = $this->PayGroups->newEntity();
        if ($this->request->is('post')) {
            $payGroup = $this->PayGroups->patchEntity($payGroup, $this->request->data);
			$payGroup['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayGroups->save($payGroup)) {
                $this->Flash->success(__('The pay group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay group could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayGroups->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->PayGroups->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->PayGroups->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->PayGroups->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->PayGroups->Customers->find('list', ['limit' => 200]);
		$frequencies = $this->PayGroups->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('legalEntities', 'businessUnits', 'divisions', 'locations','payGroup', 'customers','frequencies'));
        $this->set('_serialize', ['payGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payGroup = $this->PayGroups->get($id, [
            'contain' => []
        ]);
		
		if($payGroup['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payGroup = $this->PayGroups->patchEntity($payGroup, $this->request->data);
            if ($this->PayGroups->save($payGroup)) {
                $this->Flash->success(__('The pay group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pay group could not be saved. Please, try again.'));
            }
        }
        $legalEntities = $this->PayGroups->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->PayGroups->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->PayGroups->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->PayGroups->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->PayGroups->Customers->find('list', ['limit' => 200]);
        $frequencies = $this->PayGroups->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('legalEntities', 'businessUnits', 'divisions', 'locations','payGroup', 'customers','frequencies'));
        $this->set('_serialize', ['payGroup']);
    }
	public function get_jobinfo($id = null) 
	{
	    return $this->PayGroups->Jobinfos->find('all', array('conditions' => array('Jobinfos.pay_group_id'  => $id) ))->count();
	}
	public function get_legalentity($id = null) 
	{
	    return $this->PayGroups->LegalEntities->find('all', array('conditions' => array('LegalEntities.paygroup_id'  => $id) ))->count();
	}
	
    /**
     * Delete method
     *
     * @param string|null $id Pay Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payGroup = $this->PayGroups->get($id);
        if($payGroup['customer_id'] == $this->loggedinuser['customer_id']) 
		{
			$jobinfocount=$this->get_jobinfo($id);
			$legalentitycount=$this->get_legalentity($id);
			if($jobinfocount>0 || $legalentitycount>0){
    				
    			if($jobinfocount>0){ $this->Flash->error(__('PayGroup cannot be deleted as they have ' . $jobinfocount . ' number of jobinfos already linked.')); }
				if($legalentitycount>0){ $this->Flash->error(__('PayGroup cannot be deleted as they have ' . $legalentitycount . ' number of legalentities already linked.')); }
    			$this->redirect(array('controller' => 'PayGroups', 'action' => 'index'));

			}else{
        		if ($this->PayGroups->delete($payGroup)) {
            		$this->Flash->success(__('The pay group has been deleted.'));
        		} else {
            		$this->Flash->error(__('The pay group could not be deleted. Please, try again.'));
        		}
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
			    	
					$record = $this->PayGroups->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	$jobinfocount=$this->get_jobinfo($record['id']);
						$legalentitycount=$this->get_legalentity($record['id']);
						if($jobinfocount>0 || $legalentitycount>0){
    				
    						if($jobinfocount>0){ $this->Flash->error(__('PayGroup cannot be deleted as they have ' . $jobinfocount . ' number of jobinfos already linked.')); }
							if($legalentitycount>0){ $this->Flash->error(__('PayGroup cannot be deleted as they have ' . $legalentitycount . ' number of legalentities already linked.')); }
    						$this->redirect(array('controller' => 'PayGroups', 'action' => 'index'));

						}else{
						   if ($this->PayGroups->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
						}
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected PayGroups has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The PayGroups could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
