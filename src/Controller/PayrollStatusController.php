<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
    public function processpayroll()
    {
    	$this->paginate = [
            'contain' => []
        ];
        $payrollStatus = $this->paginate($this->PayrollStatus);

        $this->set(compact('payrollStatus'));
        $this->set('_serialize', ['payrollStatus']);
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
									  
		$usrfilter="PayrollStatus.customer_id ='".$this->loggedinuser['customer_id'] . "'";	 
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);			
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

					$this->loadModel('PayrollStatus');
					$count=$this->PayrollStatus->find('all', array('conditions' => array('employee_id'  => $childval['JobInfos']['employee_id'],'preprocess' => TRUE,
																		'current_period' => $this->request->data['period'], 'customer_id' => $this->loggedinuser['customer_id']) ))->count();
																		
					($count>0) ? $preprocessed=1 : $preprocessed=0 ;
					
					
					$this->loadModel('PayrollResult');
					$resultcount=$this->PayrollResult->find('all', array('conditions' => array('employee_id'  => $childval['JobInfos']['employee_id'],
																		'period' => $this->request->data['selectedperiod'], 'customer_id' => $this->loggedinuser['customer_id']) ))->count();
																		
					($resultcount>0) ? $payrollresult=1 : $payrollresult=0 ;
			
					$jobinfolist[] = array("employee_id" => $childval['JobInfos']['employee_id'], "employee_name" => str_replace('"', '',$this->get_nameofemployee($childval['JobInfos']['employee_id'])),
												   "preprocessed" => $preprocessed, "payrollresult" => $payrollresult);
				}

				$paygrouplist[] = array("parentid" => $value['id'] , "parent" => $value['name'] , "child" => $jobinfolist );
				// $this->Flash->error(__('DATA__.').json_encode($paygrouplist));


			}

			$this->response->body(json_encode($paygrouplist));
	    	return $this->response;
		}
	}
	public function checkEmployeePayComponent(){

		if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('EmpDataBiographies');
			$empdatabiographyarr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $this->request->data['empid']),'contain' => []])->toArray();
			isset($empdatabiographyarr[0]) ? $empdatabiographyid = $empdatabiographyarr[0]['id'] : $empdatabiographyid = "" ;

			$this->loadModel('PayrollData');
			$payrolldataarr=$this->PayrollData->find('all',['conditions' => array('PayrollData.empdatabiographies_id' => $empdatabiographyid)])
									->where("PayrollData.customer_id=".$this->loggedinuser['customer_id'])->toArray();

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
  						$outputstr[] ="Leave approval for the employee ". $this->get_employeename ($empdatabiographyid) . " from " . $empabsencerecarr[$k]['start_date']->format('d/m/Y') ." to " 
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
		$personalid=$conn->execute('select person_id_external from empdatabiographies where id='.$empdatabiographyid.'')->fetchAll('assoc');
		if($empid!="" && $empid!=null && isset($empid[0]['employee_id']) ){
			$arrayTemp1 = $conn->execute('select first_name,last_name from empdatapersonals where employee_id='.$empid[0]['employee_id'].'')->fetchAll('assoc');
		}
		
		(isset($personalid[0]['person_id_external'])) ? $personalid=$personalid[0]['person_id_external'] : $personalid="" ;
		return json_encode($arrayTemp1[0]['first_name']." ".$arrayTemp1[0]['last_name'].' ('.$personalid.')');
	}
	public function get_nameofemployee($empid = null)
	{
		$conn = ConnectionManager::get('default');
		if($empid!="" && $empid!=null && isset($empid)){
			$arrayTemp1 = $conn->execute('select first_name,last_name from empdatapersonals where employee_id='.$empid.'')->fetchAll('assoc');
		}
		$personalid=$conn->execute('select person_id_external from empdatabiographies where employee_id='.$empid.'')->fetchAll('assoc');
		(isset($personalid[0]['person_id_external'])) ? $personalid=$personalid[0]['person_id_external'] : $personalid="" ;
		return json_encode($arrayTemp1[0]['first_name']." ".$arrayTemp1[0]['last_name'].' ('.$personalid.')');
		// return json_encode($arrayTemp1[0]['first_name']." ".$arrayTemp1[0]['last_name']." (".$empid.")");
	}
	public function runPayrollByWeekly(){

		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$empid=$this->request->data['empid'];
			$fromdate=$this->request->data['fromdate'];
			$enddate=$this->request->data['enddate'];
			$conn = ConnectionManager::get('default');
			$result = $conn->execute("SELECT public.calculate_employeegrosssalary(".$empid.",'".$fromdate."','".$enddate."','".$this->loggedinuser['customer_id']."')")->fetchAll('assoc');
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
        $payrollStatus = $this->paginate($this->PayrollStatus);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		
        $this->set(compact('payrollStatus'));
        $this->set('_serialize', ['payrollStatus']);
    }
	public function pushpayrollstatus(){
		$this->autoRender= False;
		if($this->request->is('ajax')) {
						
			$this->loadModel('JobInfos');	
			$jobinfos=$this->JobInfos->find()->select(['JobInfos.pay_group_id'])->where(['JobInfos.employee_id' => $this->request->data['empid']])->first();	
			$paygroupid="";
			(isset($jobinfos['pay_group_id'])) ? $paygroupid=$jobinfos['pay_group_id'] : $paygroupid="" ;
						
			$this->loadModel('PayrollStatus');	
			$payrollStatus = $this->PayrollStatus->newEntity();
            $payrollStatus = $this->PayrollStatus->patchEntity($payrollStatus, $this->request->data);
			$payrollStatus['employee_id']=$this->request->data['empid'];
			$payrollStatus['current_period']=$this->request->data['currentperiod'];
			
			$payrollStatus['preprocess']=TRUE;			
			$payrollStatus['lock_date']=date("Y-m-d");
			$payrollStatus['lock_time']=date("h:i:sa");
			// $payrollStatus['payroll_lock']=TRUE;
			$payrollStatus['pay_group_id']=$paygroupid;
			$payrollStatus['customer_id']=$this->loggedinuser['customer_id'];
			
            if ($this->PayrollStatus->save($payrollStatus)){
            	$this->response->body("success");
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}	
		}
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
       	    $payGroups = $this->PayrollStatus->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$this->set(compact('payrollStatus','payGroups'));
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
        $payGroups = $this->PayrollStatus->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollStatus','payGroups'));
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
        $payGroups = $this->PayrollStatus->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('payrollStatus','payGroups'));
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
