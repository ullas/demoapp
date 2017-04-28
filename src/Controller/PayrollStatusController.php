<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayrollStatus Controller
 *
 * @property \App\Model\Table\PayrollStatusTable $PayrollStatus
 */
class PayrollStatusController extends AppController
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
		$contains=['PayGroups'];
									  
		$usrfilter="PayrollStatus.customer_id ='".$this->loggedinuser['customer_id'] . "'";	 
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
        $payrollStatus = $this->paginate($this->PayrollStatus);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payrollStatus'));
        $this->set('_serialize', ['payrollStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Status id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollStatus = $this->PayrollStatus->get($id, [
            'contain' => ['PayGroups']
        ]);

        if($payrollStatus['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $this->set(compact('payrollStatus'));
        $this->set('_serialize', ['payrollStatus']);
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
        $payrollStatus = $this->PayrollStatus->newEntity();
        if ($this->request->is('post')) {
            $payrollStatus = $this->PayrollStatus->patchEntity($payrollStatus, $this->request->data);
			$payrollStatus['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->PayrollStatus->save($payrollStatus)) {
                $this->Flash->success(__('The payroll status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('payrollStatus'));
        $this->set('_serialize', ['payrollStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Status id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollStatus = $this->PayrollStatus->get($id, [
            'contain' => []
        ]);
		
		if($payrollStatus['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}	

        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollStatus = $this->PayrollStatus->patchEntity($payrollStatus, $this->request->data);
            if ($this->PayrollStatus->save($payrollStatus)) {
                $this->Flash->success(__('The payroll status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payroll status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('payrollStatus'));
        $this->set('_serialize', ['payrollStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollStatus = $this->PayrollStatus->get($id);
        if($payrollStatus['customer_id'] == $this->loggedinuser['customer_id']) 
		{
        	if ($this->PayrollStatus->delete($payrollStatus)) {
            	$this->Flash->success(__('The payroll status has been deleted.'));
        	} else {
            	$this->Flash->error(__('The payroll status could not be deleted. Please, try again.'));
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
			    	
					$record = $this->PayrollStatus->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->PayrollStatus->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected PayrollStatus has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The PayrollStatus could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
