<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollRecord Controller
 *
 * @property \App\Model\Table\PayrollRecordTable $PayrollRecord
 */
class PayrollRecordController extends AppController
{

var $components = array('Datatable');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     public function processpayroll()
    {
    	$this->paginate = [
            'contain' => ['PayGroups']
        ];
        $payrollRecord = $this->paginate($this->PayrollRecord);

		$payGroups = $this->PayrollRecord->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        $this->set(compact('payrollRecord','payGroups'));
        $this->set('_serialize', ['payrollRecord']);
	}
    public function ajaxData() {
		$this->autoRender= False;
		  
		$this->loadModel('CreateConfigs');
		$dbout=$this->CreateConfigs->find()->select(['field_name', 'datatype'])->where(['table_name' => $this->request->params['controller']])->order(['id' => 'ASC'])->toArray();
		$fields = array();
		foreach($dbout as $value){
			$fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
		}
		$contains=['PayGroups'];
									  
		$usrfilter="PayrollRecord.customer_id ='".$this->loggedinuser['customer_id'] . "'";		  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
    }
    public function index()
    {
    	$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
		
        $this->paginate = [
            'contain' => ['PayGroups']
        ];
        $payrollRecord = $this->paginate($this->PayrollRecord);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payrollRecord'));
        $this->set('_serialize', ['payrollRecord']);
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Record id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollRecord = $this->PayrollRecord->get($id, [
            'contain' => ['PayrollArea']
        ]);

        $payrollArea = $this->PayrollRecord->PayrollArea->find('list', ['limit' => 200]);
        if($payrollRecord['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set(compact('payrollRecord', 'payrollArea'));
        	$this->set('_serialize', ['payrollRecord']);
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
        $payrollRecord = $this->PayrollRecord->newEntity();
        if ($this->request->is('post')) {
            $payrollRecord = $this->PayrollRecord->patchEntity($payrollRecord, $this->request->data);
			$payrollRecord['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayrollRecord->save($payrollRecord)) {
                $this->Flash->success(__('The payroll record has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll record could not be saved. Please, try again.'));
            }
        }
        $payrollArea = $this->PayrollRecord->PayrollArea->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollRecord', 'payrollArea'));
        $this->set('_serialize', ['payrollRecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Record id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollRecord = $this->PayrollRecord->get($id, [
            'contain' => []
        ]);
		
		if($payrollRecord['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollRecord = $this->PayrollRecord->patchEntity($payrollRecord, $this->request->data);
            if ($this->PayrollRecord->save($payrollRecord)) {
                $this->Flash->success(__('The payroll record has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll record could not be saved. Please, try again.'));
            }
        }
        $payrollArea = $this->PayrollRecord->PayrollArea->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollRecord', 'payrollArea'));
        $this->set('_serialize', ['payrollRecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Record id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollRecord = $this->PayrollRecord->get($id);
        if($payrollRecord['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayrollRecord->delete($payrollRecord)) {
            	$this->Flash->success(__('The payroll record has been deleted.'));
        	} else {
            	$this->Flash->error(__('The payroll record could not be deleted. Please, try again.'));
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
			    	
					$record = $this->PayrollRecord->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->PayrollRecord->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected PayrollRecord has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The PayrollRecord could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
