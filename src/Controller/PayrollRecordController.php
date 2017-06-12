<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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

		// $dbout = $this->PayrollRecord->PayGroups->find()->select(['PayGroups.id', 'PayGroups.name',])
					// // ->leftJoin('JobInfos', 'JobInfos.pay_group_id = PayGroups.id')
					// ->where(['PayGroups.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayGroups.customer_id' => '0'])->toArray();
        // $paygrouplist = array();
        // foreach($dbout as $value){
//         		
        	// $jobinfos = $this->PayrollRecord->PayGroups->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $value['id'] ])
        					// ->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			// $jobinfolist = array();
        	// foreach($jobinfos as $childval){
//         		
				// $jobinfolist[] = array("employee_id" => $childval['JobInfos']['employee_id'] );
			// }
// 			
			// $paygrouplist[] = array("parentid" => $value['id'] , "parent" => $value['name'] , "child" => $jobinfolist );
			// // $this->Flash->error(__('DATA__.').json_encode($paygrouplist));
// 			
//         	
		// }
        // $this->set('content', json_encode($paygrouplist));
		 
        $this->set(compact('payrollRecord'));
        $this->set('_serialize', ['payrollRecord']);
	}
	public function loadPayGroup() {
		$this->autoRender= False;
		if($this->request->is('ajax')) {
			
			$this->loadModel('PayGroups');
			$dbout = $this->PayGroups->find()->select(['PayGroups.id', 'PayGroups.name',])
					 ->leftJoin('Frequencies', 'Frequencies.id = PayGroups.frequency_id')
					 ->where(['LOWER(Frequencies.name)' => $this->request->data['type']])
					->andwhere(['PayGroups.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayGroups.customer_id' => '0'])->toArray();
        	$paygrouplist = array();
        	foreach($dbout as $value){
        		
        		$jobinfos = $this->PayGroups->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $value['id'] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
				$jobinfolist = array();
        		foreach($jobinfos as $childval){
        		
					$jobinfolist[] = array("employee_id" => $childval['JobInfos']['employee_id'], "employee_name" => str_replace('"', '',$this->get_nameofemployee($childval['JobInfos']['employee_id'])));
				}
			
				$paygrouplist[] = array("parentid" => $value['id'] , "parent" => $value['name'] , "child" => $jobinfolist );
				// $this->Flash->error(__('DATA__.').json_encode($paygrouplist));
			
        	
			}
        	
			$this->response->body(json_encode($paygrouplist));
	    	return $this->response;
		}		
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
    
    public function runPayroll(){
			
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;	
			$empid=$this->request->data['empid'];
			$conn = ConnectionManager::get('default');
			$result = $conn->execute("SELECT public.calculate_workingdaysofemployee(".$empid.")")->fetchAll('assoc');
			if(isset($result[0]['calculate_workingdaysofemployee'])){			
				$this->response->body(json_encode($result[0]['calculate_workingdaysofemployee']));
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}
	}
	public function runPayrollByWeekly(){
			
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;	
			$empid=$this->request->data['empid'];
			$fromdate=$this->request->data['fromdate'];
			$enddate=$this->request->data['enddate'];
			$conn = ConnectionManager::get('default');
			$result = $conn->execute("SELECT public.calculate_employeegrosssalary(".$empid.",'".$fromdate."','".$enddate."')")->fetchAll('assoc');
			if(isset($result[0]['calculate_employeegrosssalary'])){			
				$this->response->body(json_encode($result[0]['calculate_employeegrosssalary']));
	    		return $this->response;
			}else{
				$this->response->body(json_encode($result));
	    		return $this->response;
			}
		}
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
	public function checkEmployeePayComponent(){
			
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;	
			
			$this->loadModel('EmpDataBiographies');
			$empdatabiographyarr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $this->request->data['empid']),'contain' => []])->toArray();
			isset($empdatabiographyarr[0]) ? $empdatabiographyid = $empdatabiographyarr[0]['id'] : $empdatabiographyid = "" ; 
		
			$this->loadModel('PayrollData');		
			$payrolldataarr=$this->PayrollData->find('all',['conditions' => array('PayrollData.empdatabiographies_id' => $empdatabiographyid)])->where("PayrollData.pay_component_value!="."''")
										 ->where("PayrollData.paycomponent!=NULL")->andwhere("PayrollData.customer_id=".$this->loggedinuser['customer_id'])->toArray();
			if (empty($payrolldataarr)) {

				$this->response->body("Pay Component/Component Group doesn't exist for the the employee". $this->get_employeename($empdatabiographyid) );
	    		return $this->response;
			}
				
			$this->response->body("success");
	    	return $this->response;
		}
	}
	public function checkEmployeeAbsencePending(){
			
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;	
			
			$outputstr= array();
			
			$firstdate=$this->request->data['firstdate'];
			$lastdate=$this->request->data['lastdate'];
			
			
			$this->loadModel('EmpDataBiographies');
			$empdatabiographyarr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $this->request->data['empid']),'contain' => []])->toArray();
			isset($empdatabiographyarr[0]) ? $empdatabiographyid = $empdatabiographyarr[0]['id'] : $empdatabiographyid = "" ; 
		
			$this->loadModel('EmployeeAbsencerecords');		
			$empabsencerecarr=$this->EmployeeAbsencerecords->find('all',['conditions' => array('emp_data_biographies_id' => $empdatabiographyid)])->where("EmployeeAbsencerecords.status=0")
										 ->andwhere("EmployeeAbsencerecords.customer_id=".$this->loggedinuser['customer_id'])->toArray();
			foreach ($empabsencerecarr as $k=>$data) {


				$now = new \DateTime();
				
				$startdate = str_replace('/', '-', $empabsencerecarr[$k]['start_date']);
				$enddate = str_replace('/', '-', $empabsencerecarr[$k]['end_date']);

				$begin = new \DateTime( $startdate );
				$end = new \DateTime( $enddate );
				$end->modify('+1 day');

				$interval = \DateInterval::createFromDateString('1 day');
				$period = new \DatePeriod($begin, $interval, $end);

				foreach ( $period as $dt ){
	
					// $timestamp = strtotime($dt->format( "Y m d T H:ss" )); 
					// $month = date('n', $timestamp);
					
					
					if(($dt->format( "Y/m/d"))>=$firstdate && ($dt->format( "Y/m/d" ))<=$lastdate){
					// if($now->format('n')==$month){
  						$outputstr[] ="Leave approval for the employee ". $this->get_employeename($empdatabiographyid) . " From " . $empabsencerecarr[$k]['start_date']->format('d/m/Y') ." to " 
  								. $empabsencerecarr[$k]['end_date']->format('d/m/Y') . " still pending.";
						break;
						
					}
				}
				
			}
			
			
			if(count($outputstr) > 0){
				$this->response->body(json_encode($outputstr));
	    		return $this->response;
			}
				
			$this->response->body("success");
	    	return $this->response;
		}
	}
	public function get_employeename($empdatabiographyid = null) 
	{
		$conn = ConnectionManager::get('default');
		$empid = $conn->execute('select employee_id from empdatabiographies where id='.$empdatabiographyid.'')->fetchAll('assoc');
		if($empid!="" && $empid!=null && isset($empid[0]['employee_id']) ){
			$arrayTemp1 = $conn->execute('select first_name,last_name from empdatapersonals where employee_id='.$empid[0]['employee_id'].'')->fetchAll('assoc');
		}
		return json_encode($arrayTemp1[0]['first_name']." ".$arrayTemp1[0]['last_name'].' ('.$empid[0]['employee_id'].')');  
	}
	public function get_nameofemployee($empid = null) 
	{
		$conn = ConnectionManager::get('default');
		if($empid!="" && $empid!=null && isset($empid)){
			$arrayTemp1 = $conn->execute('select first_name,last_name from empdatapersonals where employee_id='.$empid.'')->fetchAll('assoc');
		}
		return json_encode($arrayTemp1[0]['first_name']." ".$arrayTemp1[0]['last_name']." (".$empid.")"); 
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
            'contain' => ['PayGroups']
        ]);

        if($payrollRecord['customer_id']==$this->loggedinuser['customer_id'])
		{
       	    $payGroups = $this->PayrollRecord->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$this->set(compact('payrollRecord', 'payGroups'));
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
        $payGroups = $this->PayrollRecord->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollRecord', 'payGroups'));
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
        $payGroups = $this->PayrollRecord->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollRecord', 'payGroups'));
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
