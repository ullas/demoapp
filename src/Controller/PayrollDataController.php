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
		$contains=['PayComponents'];
									  
		$usrfilter="PayrollData.customer_id ='".$this->loggedinuser['customer_id'] . "'";			  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
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

    /**
     * View method
     *
     * @param string|null $id Payroll Data id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollData = $this->PayrollData->get($id, [
            'contain' => ['PayComponents']
        ]);
		$payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200]);
		
		if($payrollData['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set('payComponents', $payComponents);
        	$this->set('payrollData', $payrollData);
        	$this->set('_serialize', ['payrollData']);
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
        $empDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])->select(['id'=>'EmpDataBiographies.id','name' => 'EmpDataPersonals.first_name'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')->where("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
						
		$payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
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
        $payrollData = $this->PayrollData->get($id, [
            'contain' => []
        ]);
		
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
        $payComponents = $this->PayrollData->PayComponents->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
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
