<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollData Controller
 *
 * @property \App\Model\Table\PayrollDataTable $PayrollData
 */
class PayrollDataController extends AppController
{

   var $components = array('PayrollDatatable');
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
		$contains=['PayComponents','Empdatabiographies'];
									  
		$usrfilter="PayrollData.customer_id ='".$this->loggedinuser['customer_id'] . "'";			  
		$output =$this->PayrollDatatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['PayComponents']
        ];
        $payrollData = $this->paginate($this->PayrollData);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payrollData'));
        $this->set('_serialize', ['payrollData']);
    }
	public function getPayComponentGroupData(){
		
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			$this->loadModel('PayComponents');
			
			$payComponents=$this->PayComponents->find('all')->where(['pay_component_group_id' => $this->request->query['pcgid']])
									->andwhere(['can_override' => '0'])->order(['"id"' => 'ASC'])->toArray();
			$this->response->body(json_encode($payComponents));
	    	return $this->response;
		}
	}
    /**
     * View method
     *
     * @param string|null $id Payroll Data id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollData = $this->PayrollData->find('all')->where(['empdatabiographies_id' => $id])->first();
				
		$empDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')->where("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
						
		$payComps = $this->PayrollData->find('all')->where("PayrollData.empdatabiographies_id=".$id)->andwhere("PayrollData.pay_component_type=1")
							->andwhere("PayrollData.customer_id=".$this->loggedinuser['customer_id']);
							
		$payCompGroups = $this->PayrollData->find('all')->where("PayrollData.empdatabiographies_id=".$id)->andwhere("PayrollData.pay_component_type=2")
							->andwhere("PayrollData.customer_id=".$this->loggedinuser['customer_id']);

		$payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200])->where(['can_override' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        		
		$payComponentGroups = $this->PayrollData->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
			
		if($payrollData['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('payComponents', $payComponents);
        	$this->set('payrollData', $payrollData);
        	$this->set('empDataBiographies', $empDataBiographies);
			
			$this->set('payComps',  json_encode($payComps));
			$this->set('payCompGroups',  json_encode($payCompGroups));
			
			$this->set('paycomponentarr', json_encode($payComponents));
			$this->set('paycomponentgrouparr', json_encode($payComponentGroups));		
		
        	$this->set('_serialize', ['payrollData']);
        }else{
			$this->Flash->error(__('You are not Authorized.'));
			return $this->redirect(['action' => 'index']);
       } 
    }

	public function deleteAllData()
	{
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;			
			//initially delete the particular employees data
			$this->PayrollData->deleteAll(['empdatabiographies_id' => $this->request->query['employee']]);
			
		}
	}
	public function addData()
	{
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;		
			
			$payrollData = $this->PayrollData->newEntity();
			
            $this->request->data['empdatabiographies_id']=$this->request->query['employee'];
           	$this->request->data['start_date']=$this->request->query['startdate'];
			$this->request->data['end_date']=$this->request->query['enddate'];
            $this->request->data['pay_component_id']=$this->request->query['paycomponent'];
			$this->request->data['pay_component_value']=$this->request->query['paycomponentvalue'];
			$this->request->data['pay_component_type']=$this->request->query['type'];
            $payrollData=$this->PayrollData->patchEntity($payrollData,$this->request->data);
			$payrollData['customer_id']=$this->loggedinuser['customer_id'];
			if ($this->PayrollData->save($payrollData)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {
                	$this->response->body("error");
	    			return $this->response;
            }			
		}
	}
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payrollData = $this->PayrollData->newEntity();
        if ($this->request->is('post')) {
            $payrollData = $this->PayrollData->patchEntity($payrollData, $this->request->data);
			$payrollData['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayrollData->save($payrollData)) {
                $this->Flash->success(__('The payroll data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll data could not be saved. Please, try again.'));
            }
        }
		$emparr = $this->PayrollData->find('all')->select(['empdatabiographies_id'])->where(['PayrollData.customer_id='.$this->loggedinuser['customer_id']]);
        
        $empDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
						->where(['EmpDataBiographies.id NOT IN'=>$emparr])->andwhere("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
						
		$payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200])->where(['can_override' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollData', 'payComponents','empDataBiographies'));
        $this->set('_serialize', ['payrollData']);
		
		$payComponentGroups = $this->PayrollData->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$this->set('paycomponentarr', json_encode($payComponents));
		$this->set('paycomponentgrouparr', json_encode($payComponentGroups));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Data id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollData = $this->PayrollData->find('all')->where(['empdatabiographies_id' => $id])->first();
		
		if($payrollData['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollData = $this->PayrollData->patchEntity($payrollData, $this->request->data);
            if ($this->PayrollData->save($payrollData)) {
                $this->Flash->success(__('The payroll data has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll data could not be saved. Please, try again.'));
            }
        }
		
        $emparr = $this->PayrollData->find('all')->select(['empdatabiographies_id'])->where(['PayrollData.empdatabiographies_id!='.$id])
        				->andwhere(['PayrollData.customer_id='.$this->loggedinuser['customer_id']]);
        
        $empDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
						->where(['EmpDataBiographies.id NOT IN'=>$emparr])->andwhere("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
						
		$payComps = $this->PayrollData->find('all')->where("PayrollData.empdatabiographies_id=".$id)->andwhere("PayrollData.pay_component_type=1")
							->andwhere("PayrollData.customer_id=".$this->loggedinuser['customer_id']);
							
		$payCompGroups = $this->PayrollData->find('all')->where("PayrollData.empdatabiographies_id=".$id)->andwhere("PayrollData.pay_component_type=2")
							->andwhere("PayrollData.customer_id=".$this->loggedinuser['customer_id']);

		$payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200])->where(['can_override' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        		
		$payComponentGroups = $this->PayrollData->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
     
        $this->set('empDataBiographies', $empDataBiographies);
			
		$this->set('payComps',  json_encode($payComps));
		$this->set('payCompGroups',  json_encode($payCompGroups));
			
		$this->set('paycomponentarr', json_encode($payComponents));
		$this->set('paycomponentgrouparr', json_encode($payComponentGroups));		
			
		$this->set(compact('payrollData', 'payComponents'));
		
        $this->set('_serialize', ['payrollData']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Data id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollData = $this->PayrollData->get($id);
        if($payrollData['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayrollData->delete($payrollData)) {
            	$this->Flash->success(__('The payroll data has been deleted.'));
        	} else {
            	$this->Flash->error(__('The payroll data could not be deleted. Please, try again.'));
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
			    	
					$record = $this->PayrollData->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->PayrollData->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected PayrollData has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The PayrollData could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
