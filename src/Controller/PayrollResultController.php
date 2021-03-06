<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollResult Controller
 *
 * @property \App\Model\Table\PayrollResultTable $PayrollResult
 */
class PayrollResultController extends AppController
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
		$contains=['PayGroups', 'PayComponents'];
									  
		$usrfilter="PayrollResult.customer_id ='".$this->loggedinuser['customer_id'] . "'";			  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['PayGroups', 'PayComponents']
        ];
        $payrollResult = $this->paginate($this->PayrollResult);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payrollResult'));
        $this->set('_serialize', ['payrollResult']);
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Result id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollResult = $this->PayrollResult->get($id, [
            'contain' => ['PayGroups', 'PayComponents']
        ]);

       	$payGroups = $this->PayrollResult->PayGroups->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponents = $this->PayrollResult->PayComponents->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        if($payrollResult['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set(compact('payrollResult', 'payGroups', 'payComponents'));
       		$this->set('_serialize', ['payrollResult']);
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
        $payrollResult = $this->PayrollResult->newEntity();
        if ($this->request->is('post')) {
            $payrollResult = $this->PayrollResult->patchEntity($payrollResult, $this->request->data);
			$payrollResult['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayrollResult->save($payrollResult)) {
                $this->Flash->success(__('The payroll result has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll result could not be saved. Please, try again.'));
            }
        }
        $payGroups = $this->PayrollResult->PayGroups->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponents = $this->PayrollResult->PayComponents->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollResult', 'payGroups', 'payComponents'));
        $this->set('_serialize', ['payrollResult']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Result id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollResult = $this->PayrollResult->get($id, [
            'contain' => []
        ]);
		
		if($payrollResult['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollResult = $this->PayrollResult->patchEntity($payrollResult, $this->request->data);
            if ($this->PayrollResult->save($payrollResult)) {
                $this->Flash->success(__('The payroll result has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll result could not be saved. Please, try again.'));
            }
        }
        $payGroups = $this->PayrollResult->PayGroups->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponents = $this->PayrollResult->PayComponents->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollResult', 'payGroups', 'payComponents'));
        $this->set('_serialize', ['payrollResult']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollResult = $this->PayrollResult->get($id);
        if($payrollResult['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayrollResult->delete($payrollResult)) {
            	$this->Flash->success(__('The payroll result has been deleted.'));
        	} else {
            	$this->Flash->error(__('The payroll result could not be deleted. Please, try again.'));
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
			    	
					$record = $this->PayrollResult->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->PayrollResult->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected PayrollResult has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The PayrollResult could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
