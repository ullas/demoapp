<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * PayrollData Controller
 *
 * @property \App\Model\Table\PayrollDataTable $PayrollData
 */
class PayrollDataController extends AppController
{

 
    public function index()
    {
		// $tempdate= date('Y-m-d', strtotime('first day of previous month'));$this->Flash->error(__($tempdate));
		
        $this->paginate = [
            'contain' => []
        ];
        $payrollData = $this->paginate($this->PayrollData);	
		
        $this->set(compact('payrollData'));
        $this->set('_serialize', ['payrollData']);									
		
		$this->loadModel('PayComponents');
		$payComps = $this->PayComponents->find('all', ['limit' => 200])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		
		($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;
		
		$this->loadModel('PayrollData');
		$dbout = $this->PayrollData->find()->select(['empdatabiographies_id'])
					->where(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayrollData.customer_id' => '0'])->distinct()->toArray();
        $payrolldatalist = array();
        foreach($dbout as $value){

        	$paycomponents = $this->PayrollData->find('all')->where(['PayrollData.empdatabiographies_id' => $value['empdatabiographies_id'] ])
							// ->leftJoin('PayComponents', 'PayComponents.id = PayrollData.paycomponent')
        					->andwhere(['PayrollData.pay_component_type' => '1'])->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			$paycomponentlist = array();
        	foreach($paycomponents as $childval){

				$this->loadModel('PayComponents');
        	    $pcname=$this->PayComponents->find()->select(['PayComponents.name','PayComponents.can_override','PayComponents.pay_component_value'])
        	    				->where(['PayComponents.id' => $childval['paycomponent']])->first();
				
				//return components value if can_override set false
				$compval=$childval['pay_component_value'];
				if(isset($pcname['can_override']) && $pcname['can_override']=="1"){
					$compval=$pcname['pay_component_value'];
				}
				$paycomponentlist[] = array("id"=>$childval['id'],"paycomponent" => $pcname['name'],"startdate" => $childval['start_date']->format($mptldateformat),
						"enddate" => $childval['end_date']->format($mptldateformat), "paycomponentvalue" => $compval );
			}

			
			$this->loadModel('PayrollData');
			$pcgroupout = $this->PayrollData->find()->select(['paycomponentgroup'])->where(['PayrollData.empdatabiographies_id' => $value['empdatabiographies_id'] ])
					->andwhere(['PayrollData.pay_component_type' => '2'])
					->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayrollData.customer_id' => '0'])->distinct()->toArray();
			$paycomponentgrouplist = array();
			foreach($pcgroupout as $groupchildval){
						
				$paycomponentgroups = $this->PayrollData->find('all')->where(['PayrollData.empdatabiographies_id' => $value['empdatabiographies_id'] ])
							->andwhere(['PayrollData.paycomponentgroup' => $groupchildval['paycomponentgroup']])
        					->andwhere(['PayrollData.pay_component_type' => '2'])->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->toArray();
				$componentlist = array();
        		
				$this->loadModel('PayComponentGroups');
        	    $pcgroupname=$this->PayComponentGroups->find()->select('PayComponentGroups.name')->where(['PayComponentGroups.id' => $groupchildval['paycomponentgroup']])->first();
					
        		foreach($paycomponentgroups as $childval){
				
					$this->loadModel('PayComponents');
        	    	$pcname=$this->PayComponents->find()->select(['PayComponents.name','PayComponents.can_override','PayComponents.pay_component_value'])
        	    					->where(['PayComponents.id' => $childval['paycomponent']])->first();
					//return components value if can_override set false
					$compval=$childval['pay_component_value'];
					if(isset($pcname['can_override']) && $pcname['can_override']=="1"){
						$compval=$pcname['pay_component_value'];
					}
					$componentlist[] = array("compid"=>$childval['id'],"paycomponent" => $pcname['name'],"startdate" => $childval['start_date']->format($mptldateformat),
					"enddate" => $childval['end_date']->format($mptldateformat), "paycomponentvalue" => $compval, "paycomponentgroup" => $pcgroupname['name'] );
				}
				
				$paycomponentgrouplist[] = array("groupid"=>$groupchildval['paycomponentgroup'], "groupname"=>$pcgroupname['name'], "grouplist" => $componentlist );
			}
			$payrolldatalist[] = array("empid" => $value['empdatabiographies_id'], "empname"=>str_replace('"', '',$this->get_employeename ($value['empdatabiographies_id'])),
													 "pcchild" => $paycomponentlist, "pcgroupchild" => $paycomponentgrouplist  );
		}

        $this->set('content', $payrolldatalist);
		
		
		$empgrouplist = $this->PayrollData->find()->select(['empdatabiographies_id','paycomponentgroup'])->distinct('empdatabiographies_id')->where(['PayrollData.pay_component_type' => 2])
					->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayrollData.customer_id' => '0']);
		$this->set('empgrouplist', json_encode($empgrouplist));
					
		$this->loadModel('PayComponents');
        $payComponents = $this->PayComponents->find('all', ['limit' => 200])
        							// ->where(['end_date >=' => date("Y/m/d")])
        							->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$this->set('paycomponentarr', json_encode($payComponents));
		$this->set('paycomponentgrouparr', json_encode($payComponentGroups));
		
		// $this->Flash->error(__('DATA__.').date("Y/m/d"));
		
    }
    public function alert(){
    	
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
	public function batchadd(){
		
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
			
		$payrollData = $this->PayrollData->newEntity();
		$this->loadModel('PayComponents');	
		$payComponents = $this->PayComponents->find('list', ['limit' => 200])
									->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	
		$this->set(compact('payrollData', 'payComponents'));
		
		$this->loadModel('PayrollRecord');	
		$dbout = $this->PayrollRecord->PayGroups->find()->select(['PayGroups.id', 'PayGroups.name',])
					// ->leftJoin('JobInfos', 'JobInfos.pay_group_id = PayGroups.id')
					->where(['PayGroups.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayGroups.customer_id' => '0'])->toArray();
        $paygrouplist = array();
        foreach($dbout as $value){

        	$jobinfos = $this->PayrollRecord->PayGroups->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $value['id'] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			$jobinfolist = array();
        	foreach($jobinfos as $childval){

				$jobinfolist[] = array("employee_id" => $childval['JobInfos']['employee_id'] );
			}

			$paygrouplist[] = array("parentid" => $value['id'] , "parent" => $value['name'] , "child" => $jobinfolist );
			// $this->Flash->error(__('DATA__.').json_encode($paygrouplist));


		}
		
        $this->set('paygrouplist', $paygrouplist);
	}
	public function batchremove(){
		
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
	
		$payrollData = $this->PayrollData->newEntity();
		// $this->loadModel('PayComponents');	
		// $payComponentarr = $this->PayrollData->find('all')->where(['pay_component_type' => '1'])->andwhere(['batch' => TRUE])
									// ->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0'])->distinct('paycomponent')->toArray();
		// $payComponents = "";
		// foreach($payComponentarr as $paycomponentvalue){
			// $this->loadModel('PayComponents');
			// $pcname=$this->PayComponents->find()->select('PayComponents.name')->where(['PayComponents.id' => $paycomponentvalue['paycomponent']])->first();	
			// $payComponents = array($paycomponentvalue['paycomponent'] => $pcname['name']);						
		// }
		// $payComponents = $this->PayComponents->find('list', ['limit' => 200])
									// ->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	
		$this->set(compact('payrollData'));
		
		$this->loadModel('PayrollRecord');	
		$dbout = $this->PayrollRecord->PayGroups->find()->select(['PayGroups.id', 'PayGroups.name',])
					// ->leftJoin('JobInfos', 'JobInfos.pay_group_id = PayGroups.id')
					->where(['PayGroups.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayGroups.customer_id' => '0'])->toArray();
        $paygrouplist = array();
        foreach($dbout as $value){

        	$jobinfos = $this->PayrollRecord->PayGroups->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $value['id'] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			$jobinfolist = array();
        	foreach($jobinfos as $childval){

				$jobinfolist[] = array("employee_id" => $childval['JobInfos']['employee_id'] );
			}

			$paygrouplist[] = array("parentid" => $value['id'] , "parent" => $value['name'] , "child" => $jobinfolist );
			// $this->Flash->error(__('DATA__.').json_encode($paygrouplist));

		}
		
        $this->set('paygrouplist', $paygrouplist);
		
		($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;
		
		$this->loadModel('PayrollData');	
		$paycomponents = $this->PayrollData->find('all')->where(['pay_component_type' => '1'])->andwhere(['batch' => TRUE])->distinct('paycomponent')
        					->andwhere(['PayrollData.pay_component_type' => '1'])->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->toArray();
		$paycomponentlist = array();
        foreach($paycomponents as $childval){

			$this->loadModel('PayComponents');
        	$pcname=$this->PayComponents->find()->select(['PayComponents.name','PayComponents.can_override','PayComponents.pay_component_value'])
        	    					->where(['PayComponents.id' => $childval['paycomponent']])->first();
			//return components value if can_override set false
			$compval=$childval['pay_component_value'];
			if(isset($pcname['can_override']) && $pcname['can_override']=="1"){
				$compval=$pcname['pay_component_value'];
			}	
			$paycomponentlist[] = array("id"=>$childval['id'],"paycomponentid" => $childval['paycomponent'],"paycomponent" => $pcname['name'],"startdate" => $childval['start_date']->format($mptldateformat),
			"enddate" => $childval['end_date']->format($mptldateformat), "paycomponentvalue" => $compval );
		}

		$this->loadModel('PayrollData');
			$pcgroupout = $this->PayrollData->find()->select(['paycomponentgroup'])->where(['pay_component_type' => '2'])->andwhere(['batch' => TRUE])
					->andwhere(['PayrollData.pay_component_type' => '2'])
					->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayrollData.customer_id' => '0'])->distinct('paycomponentgroup')->toArray();
			$paycomponentgrouplist = array();
			foreach($pcgroupout as $groupchildval){
						
				$paycomponentgroups = $this->PayrollData->find('all')->where(['pay_component_type' => '2'])->andwhere(['batch' => TRUE])
							->andwhere(['PayrollData.paycomponentgroup' => $groupchildval['paycomponentgroup']])->distinct('paycomponent')
        					->andwhere(['PayrollData.pay_component_type' => '2'])->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->toArray();
				$componentlist = array();
        		
				$this->loadModel('PayComponentGroups');
        	    $pcgroupname=$this->PayComponentGroups->find()->select('PayComponentGroups.name')->where(['PayComponentGroups.id' => $groupchildval['paycomponentgroup']])->first();
					
        		foreach($paycomponentgroups as $childval){
				
					$this->loadModel('PayComponents');
        	    	$pcname=$this->PayComponents->find()->select(['PayComponents.name','PayComponents.can_override','PayComponents.pay_component_value'])
        	    					->where(['PayComponents.id' => $childval['paycomponent']])->first();
					//return components value if can_override set false
					$compval=$childval['pay_component_value'];
					if(isset($pcname['can_override']) && $pcname['can_override']=="1"){
						$compval=$pcname['pay_component_value'];
					}
					$componentlist[] = array("compid"=>$childval['id'],"paycomponent" => $pcname['name'],"startdate" => $childval['start_date']->format($mptldateformat),
					"enddate" => $childval['end_date']->format($mptldateformat), "paycomponentvalue" => $compval, "paycomponentgroup" => $pcgroupname['name'] );
				}
				
				$paycomponentgrouplist[] = array("groupid"=>$groupchildval['paycomponentgroup'], "groupname"=>$pcgroupname['name'], "grouplist" => $componentlist );
			}
			$payrolldatalist[] = array( "pcchild" => $paycomponentlist, "pcgroupchild" => $paycomponentgrouplist  );
		
		$this->set('paycompcontent', $payrolldatalist);
		
	}
	public function copyEmployeesPC(){
			
			//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
		
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$successcounter=0;$errorcounter=0;
			$oldempid = $this->request->data['oldemp'] ;  
			$newempid = $this->request->data['newemp'] ;  
			
			($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;
		
			if($oldempid!="" && $oldempid!=null && $newempid!="" && $newempid!=null){
				$dbdatas = $this->PayrollData->find('all')->where(['PayrollData.empdatabiographies_id' => $oldempid ])
										->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->toArray();
        		foreach($dbdatas as $childval){
        				
        			$this->loadModel('PayrollData');
					$payrollData = $this->PayrollData->newEntity();
            		$payrollData = $this->PayrollData->patchEntity($payrollData, $this->request->data);
					
					$payrollData['empdatabiographies_id']=$newempid;
					
					$payrollData['pay_component_value']=$childval['pay_component_value'];
					$payrollData['start_date']=$childval['start_date']->format($mptldateformat);
					$payrollData['end_date']=$childval['end_date']->format($mptldateformat);
					$payrollData['pay_component_type']=$childval['pay_component_type'];
					$payrollData['paycomponent']=$childval['paycomponent'];
					$payrollData['paycomponentgroup']=$childval['paycomponentgroup'];
					$payrollData['batch']=$childval['batch'];
					$payrollData['customer_id']=$this->loggedinuser['customer_id'];
					
            		if ($this->PayrollData->save($payrollData)) {
            			$successcounter++;
					}else{
						$errorcounter++;
					}
				}
				
			}
			if($errorcounter<1){
				$this->response->body("success");
	    		return $this->response;
			}else{
				if($successcounter>0){
					$this->response->body("Partially copied.");
	    			return $this->response;
				}else{
					$this->response->body("Error while copying Pay Component's.");
	    			return $this->response;
				}
			}
			
		}
	}
	public function batchdeletePC(){
			
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 $this->response->body("payrolllocked");
	    	 return $this->response;	 
		}
		
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$checkedpaygroups=json_decode($this->request->data['checkedarr']);
			
			for($k=0;$k<sizeof($checkedpaygroups);$k++) {
			
				$this->loadModel('JobInfos');	
				$jobinfos = $this->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $checkedpaygroups[$k] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();//$this->Flash->error(__('You are not Authorized.'.json_encode($jobinfos)));
        		foreach($jobinfos as $childval){
        			$this->loadModel('EmpDataBiographies');
					$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $childval['employee_id']),'contain' => []])->toArray();
					isset($emparr[0]) ? $empid = $emparr[0]['id'] : $empid = "" ; 
					
					$this->loadModel('PayrollData');
					$count=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $empid,'pay_component_type'  => 1,'paycomponent' => $this->request->data['paycomponentid'] ) ))->count();
					if($count>0){	
					if($this->PayrollData->deleteAll(['empdatabiographies_id' => $empid,'pay_component_type'  => 1,'paycomponent' => $this->request->data['paycomponentid'],'batch'=>TRUE])){
						
					}else{
						$this->response->body("error");
	    				return $this->response;
					}
					}
				}
				//return success @last
				if(($k+1)==sizeof($checkedpaygroups)){
					$this->response->body("success");
	    			return $this->response;
				}
			}	
		}
	}
	public function empdeletePC(){
		
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 $this->response->body("payrolllocked");
	    	 return $this->response;	 
		}
		
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			
			// $this->loadModel('EmpDataBiographies');
			// $emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $this->request->data['empid']),'contain' => []])->toArray();
			// isset($emparr[0]) ? $empid = $emparr[0]['id'] : $empid = "" ; 
// 			
			// $this->loadModel('PayrollData');		
			$count=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $this->request->data['empid']) ))->count();
			if($count>0){	
				if($this->PayrollData->deleteAll(['empdatabiographies_id' => $this->request->data['empid']])){
					$this->response->body("success");
	    			return $this->response;	
				}else{
					$this->response->body("error");
	    			return $this->response;
				}
			}
		}
	}
	public function batchdeletePCGroup(){
		
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 $this->response->body("payrolllocked");
	    	 return $this->response;	 	 
		}
			
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$checkedpaygroups=json_decode($this->request->data['checkedarr']);
			
			for($k=0;$k<sizeof($checkedpaygroups);$k++) {
			
				$this->loadModel('JobInfos');	
				$jobinfos = $this->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $checkedpaygroups[$k] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();//$this->Flash->error(__('You are not Authorized.'.json_encode($jobinfos)));
        		foreach($jobinfos as $childval){
        			$this->loadModel('EmpDataBiographies');
					$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $childval['employee_id']),'contain' => []])->toArray();
					isset($emparr[0]) ? $empid = $emparr[0]['id'] : $empid = "" ; 
					
					$this->loadModel('PayrollData');
					$count=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $empid,'pay_component_type'  => 2,'batch'=>TRUE,
															'paycomponentgroup' => $this->request->data['paycomponentgroupid'] ) ))->count();
					if($count>0){	
					if($this->PayrollData->deleteAll(['empdatabiographies_id' => $empid,'pay_component_type'  => 2,'paycomponentgroup' => $this->request->data['paycomponentgroupid'],'batch'=>TRUE])){
						
					}else{
						$this->response->body("error");
	    				return $this->response;
					}
					}
				}
				//return success @last
				if(($k+1)==sizeof($checkedpaygroups)){
					$this->response->body("success");
	    			return $this->response;
				}
			}	
		}
	}
	public function copypaycomponents($id = null)
    {
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
		
		($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;
		
    	$payrollData = $this->PayrollData->find('all')->where(['empdatabiographies_id' => $id])->first();
		
    	$payrolldatalist = array();
        
        $paycomponents = $this->PayrollData->find('all')->where(['PayrollData.empdatabiographies_id' => $id ])
        					->andwhere(['PayrollData.pay_component_type' => '1'])->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->toArray();
		$paycomponentlist = array();
        foreach($paycomponents as $childval){

			$this->loadModel('PayComponents');
        	$pcname=$this->PayComponents->find()->select(['PayComponents.name','PayComponents.can_override','PayComponents.pay_component_value'])
        	    					->where(['PayComponents.id' => $childval['paycomponent']])->first();
			//return components value if can_override set false
			$compval=$childval['pay_component_value'];
			if(isset($pcname['can_override']) && $pcname['can_override']=="1"){
				$compval=$pcname['pay_component_value'];
			}
			$paycomponentlist[] = array("id"=>$childval['id'],"paycomponent" => $pcname['name'],"startdate" => $childval['start_date']->format($mptldateformat),
			"enddate" => $childval['end_date']->format($mptldateformat),  "paycomponentvalue" => $compval );
		}

		$this->loadModel('PayrollData');
			$pcgroupout = $this->PayrollData->find()->select(['paycomponentgroup'])->where(['PayrollData.empdatabiographies_id' => $id ])
					->andwhere(['PayrollData.pay_component_type' => '2'])
					->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayrollData.customer_id' => '0'])->distinct()->toArray();
			$paycomponentgrouplist = array();
			foreach($pcgroupout as $groupchildval){
						
				$paycomponentgroups = $this->PayrollData->find('all')->where(['PayrollData.empdatabiographies_id' => $id ])
							->andwhere(['PayrollData.paycomponentgroup' => $groupchildval['paycomponentgroup']])
        					->andwhere(['PayrollData.pay_component_type' => '2'])->andwhere(['PayrollData.customer_id' => $this->loggedinuser['customer_id']])->toArray();
				$componentlist = array();
        		
				$this->loadModel('PayComponentGroups');
        	    $pcgroupname=$this->PayComponentGroups->find()->select('PayComponentGroups.name')->where(['PayComponentGroups.id' => $groupchildval['paycomponentgroup']])->first();
					
        		foreach($paycomponentgroups as $childval){
				
					$this->loadModel('PayComponents');
        	    	$pcname=$this->PayComponents->find()->select(['PayComponents.name','PayComponents.can_override','PayComponents.pay_component_value'])
        	    					->where(['PayComponents.id' => $childval['paycomponent']])->first();
					//return components value if can_override set false
					$compval=$childval['pay_component_value'];
					if(isset($pcname['can_override']) && $pcname['can_override']=="1"){
						$compval=$pcname['pay_component_value'];
					}
					$componentlist[] = array("compid"=>$childval['id'],"paycomponent" => $pcname['name'],"startdate" => $childval['start_date']->format($mptldateformat),
					"enddate" => $childval['end_date']->format($mptldateformat), "paycomponentvalue" => $compval, "paycomponentgroup" => $pcgroupname['name'] );
				}
				
				$paycomponentgrouplist[] = array("groupid"=>$groupchildval['paycomponentgroup'], "groupname"=>$pcgroupname['name'], "grouplist" => $componentlist );
			}
			$payrolldatalist[] = array("empid" => $id, "empname"=>str_replace('"', '',$this->get_employeename ($id)),
													 "pcchild" => $paycomponentlist, "pcgroupchild" => $paycomponentgrouplist  );
		
		$this->set('paycompcontent', $payrolldatalist);
													 
		$emparr = $this->PayrollData->find('all')->select(['empdatabiographies_id'])->where(['PayrollData.customer_id='.$this->loggedinuser['customer_id']]);
        
        $excludingempDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
						->where(['EmpDataBiographies.id NOT IN'=>$emparr])
						->andwhere("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
		

		$this->set(compact('payrollData', 'excludingempDataBiographies'));
        
    }
	public function getPayComponentGroupData(){
		
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			$this->loadModel('PayComponents');
			
			$payComponents=$this->PayComponents->find('all')->where(['pay_component_group_id' => $this->request->query['pcgid']])
									// ->where(['end_date >=' => date("Y/m/d")])
									->order(['"id"' => 'ASC'])->toArray();
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

		$this->loadModel("PayComponents");
		$payComponents = $this->PayComponents->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        		
		$payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
			
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
			$count=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $this->request->query['employee']) ))->count();
			if($count>0){
			//initially delete the particular employees data
			if($this->PayrollData->deleteAll(['empdatabiographies_id' => $this->request->query['employee']])){
				$this->response->body("success");
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
			}else{
				$this->response->body("success");
	    		return $this->response;
			}
			
		}
	}
	public function checkPayComponentExistence(){
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;	
			//initiallly query  
			$compquery=$this->PayrollData->find('all', array('conditions'=>array('empdatabiographies_id' => $this->request->data['employee'],'pay_component_type' => 1,
							'paycomponent' =>$this->request->data['paycomponent'],'customer_id' => $this->loggedinuser['customer_id']) ))->where(['id!='.$this->request->data['id']]);
									
			$userdf = $this->request->session()->read('sessionuser')['dateformat'];
			$compquerycount=$compquery->count();
			if($compquerycount<1){
				$this->response->body("success");
	    		return $this->response;
			}
			
			foreach ($compquery as $row) {
				
            if($row['start_date']!="" && $row['start_date']!=null && $row['end_date']!="" && $row['end_date']!=null){
				//convert date format		
				if(isset($userdf)  & $userdf===1){
					$startdate = $row['start_date']->format('d/m/Y');
					$enddate = $row['end_date']->format('d/m/Y');
				
				}else{
					$startdate = $row['start_date']->format('m/d/Y');
					$enddate = $row['end_date']->format('m/d/Y');
				}
					$firstdate = $this->request->data['startdate'];
					$lastdate=$this->request->data['enddate'];
				
				
			// $this->Flash->error(__('o/p:.'.$startdate.$this->request->data['startdate']));
			
				if(($firstdate<=$startdate) || ($lastdate<=$startdate) || ($firstdate<=$enddate) || ($lastdate<=$enddate)){
					$this->response->body("Pay Component exists already in the same period duration(".$startdate."-".$enddate.").Please check and try again.");
	    			return $this->response;
				}
		
			}
			}
			$this->response->body("success");
	    	return $this->response;

		}
	}
	public function addData()
	{
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
		
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;		
			
			$payrollData = $this->PayrollData->newEntity();
			
            $payrollData=$this->PayrollData->patchEntity($payrollData,$this->request->data);
			
			$payrollData['empdatabiographies_id']=$this->request->data['employee'];
           	$payrollData['start_date']=$this->request->data['startdate'];
			$payrollData['end_date']=$this->request->data['enddate'];
            $payrollData['paycomponent']=$this->request->data['paycomponent'];
			$payrollData['pay_component_value']=$this->request->data['paycomponentvalue'];
			$payrollData['pay_component_type']=$this->request->data['type'];
			$payrollData['paycomponentgroup']=$this->request->data['paycomponentgroup'];
			
			$payrollData['customer_id']=$this->loggedinuser['customer_id'];
			
			$userdf = $this->request->session()->read('sessionuser')['dateformat'];
            
			//initiallly query  
			$groupquery=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $payrollData['empdatabiographies_id'],'pay_component_type'  => 2,
									'paycomponent'  =>$payrollData['paycomponent'],'paycomponentgroup'  => $payrollData['paycomponentgroup'],'customer_id'  => $this->loggedinuser['customer_id']) ));
									
			$groupquerycount=$groupquery->count();
			if($groupquerycount>0){
				//initially delete the particular employees data
				$this->PayrollData->deleteAll(['empdatabiographies_id' => $payrollData['empdatabiographies_id'],'pay_component_type'  => 2,
									'paycomponent'  =>$payrollData['paycomponent'],'paycomponentgroup'  => $payrollData['paycomponentgroup'],'customer_id'  => $this->loggedinuser['customer_id']]);
			}

			//initiallly query  
			$compquery=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $payrollData['empdatabiographies_id'],'pay_component_type'  => 1,
									'paycomponent'  =>$payrollData['paycomponent'],'paycomponentgroup'  => $payrollData['paycomponentgroup'],'customer_id'  => $this->loggedinuser['customer_id']) ));
			
			foreach ($compquery as $row) {			//$this->Flash->error(__('O/P:'.json_encode($row)));			
			if($row['start_date']!=""  && $row['start_date']!=null && $row['end_date']!="" && $row['end_date']!=null){
						
						
				if(isset($userdf)  & $userdf===1){
					$startdate = $row['start_date']->format('d/m/Y');
					$enddate = $row['end_date']->format('d/m/Y');
				
				}else{
					$startdate = $row['start_date']->format('m/d/Y');
					$enddate = $row['end_date']->format('m/d/Y');
				}
				
			
							
				if($payrollData['start_date']<=$enddate || $payrollData['end_date']<=$enddate){
					$this->response->body("Pay Component exists already in the same period duration(".$startdate."-".$enddate.").Please check and try again.");
	    			return $this->response;
				}
		
			}
			}
			if ($this->PayrollData->save($payrollData)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {

                	$this->response->body("error");
	    			return $this->response;
            }			
		}
	}
	public function addBatchData()
	{
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
		
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;		
			
			$checkedpaygroups=json_decode($this->request->data['checkedarr']);
			for($k=0;$k<sizeof($checkedpaygroups);$k++) {
			
			$this->loadModel('JobInfos');	
			$jobinfos = $this->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $checkedpaygroups[$k] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
        	foreach($jobinfos as $childval){
        		
				$alreadyexists=0;
        	
			$this->loadModel('PayrollData');		
			$payrollData = $this->PayrollData->newEntity();
			
            $payrollData=$this->PayrollData->patchEntity($payrollData,$this->request->data);
			
			
           	$payrollData['start_date']=$this->request->data['startdate'];
			$payrollData['end_date']=$this->request->data['enddate'];
            $payrollData['paycomponent']=$this->request->data['paycomponent'];
			$payrollData['pay_component_value']=$this->request->data['paycomponentvalue'];
			$payrollData['pay_component_type']=$this->request->data['type'];
			$payrollData['paycomponentgroup']=$this->request->data['paycomponentgroup'];
			
			$payrollData['batch']=1;
			
			$payrollData['customer_id']=$this->loggedinuser['customer_id'];
			
			// $userdf = $this->request->session()->read('sessionuser')['dateformat'];
            // if(isset($userdf)  & $userdf===1){
				// foreach (["start_date", "end_date"] as $value) {		
					// if(isset($payrollData[$value])){			
						// if($payrollData[$value]!=null && $payrollData[$value]!='' && strpos($payrollData[$value], '/') !== false){
							// $payrollData[$value] = str_replace('/', '-', $payrollData[$value]);
							// $payrollData[$value]=date('Y/m/d', strtotime($payrollData[$value]));
						// }
					// }
				// }
			// }
			
			
				$this->loadModel('EmpDataBiographies');
		$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $childval['employee_id']),'contain' => []])->toArray();
		isset($emparr[0]) ? $empid = $emparr[0]['id'] : $empid = "" ;  
			
			$payrollData['empdatabiographies_id']=$empid;
			//initiallly query  
			$this->loadModel('PayrollData');
			$groupquery=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $payrollData['empdatabiographies_id'],'pay_component_type'  => 2,
									'paycomponent'  =>$payrollData['paycomponent'],'paycomponentgroup'  => $payrollData['paycomponentgroup'],'customer_id'  => $this->loggedinuser['customer_id']) ));
									
			$groupquerycount=$groupquery->count();
			if($groupquerycount>0){
				//initially delete the particular employees data
				// $this->PayrollData->deleteAll(['empdatabiographies_id' => $payrollData['empdatabiographies_id'],'pay_component_type'  => 2,
									// 'paycomponent'  =>$payrollData['paycomponent'],'paycomponentgroup'  => $payrollData['paycomponentgroup'],'customer_id'  => $this->loggedinuser['customer_id']]);
			}

			//initiallly query  
			$compquery=$this->PayrollData->find('all', array('conditions' => array('empdatabiographies_id'  => $payrollData['empdatabiographies_id'],'pay_component_type'  => 1,
									'paycomponent'  =>$payrollData['paycomponent'],'paycomponentgroup'  => $payrollData['paycomponentgroup'],'customer_id'  => $this->loggedinuser['customer_id']) ));
			
			foreach ($compquery as $row) {						
			if($row['start_date']!=""  && $row['start_date']!=null && $row['end_date']!="" && $row['end_date']!=null){
						
						
				if(isset($userdf)  & $userdf===1){
					$startdate = \DateTime::createFromFormat('d/m/Y', $row['start_date']);
					$startdate=date_format($startdate, 'Y/m/d');
					$enddate = \DateTime::createFromFormat('d/m/Y', $row['end_date']);
					$enddate=date_format($enddate, 'Y/m/d');
				}else{
					$enddate = $row['end_date'];
					$startdate=$row['start_date'];
				}
				// $this->Flash->error(__('O/P:'.$payrollData['start_date'].'---'.$enddate));
			
							
				if($payrollData['start_date']<=$startdate || $payrollData['end_date']<=$startdate || $payrollData['start_date']<=$enddate || $payrollData['end_date']<=$enddate){
					// $this->response->body("Pay Component exists already in the same period duration(".$startdate."-".$enddate.").Please check and try again.");
	    			// return $this->response;
	    			$alreadyexists++;
				}
		
			}
			}
//check if doesnt exists already			
if($alreadyexists<1){
			if ($this->PayrollData->save($payrollData)) {
					// if (($k+1)==sizeof($checkedpaygroups)) {
               	 		// $this->response->body("success");
	    				// return $this->response;
					// }
            } else {

                	$this->response->body("error");
	    			return $this->response;
            }
}
            }	
					if (($k+1)==sizeof($checkedpaygroups)) {
               	 		$this->response->body("success");
	    				return $this->response;
					}		
		}

		}
	}

	public function addempdata($id = null)
    {
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
		
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
		
		$empDataBiographies[$id] = str_replace('"', '',$this->get_employeename ($id));						
		
		$this->loadModel("PayComponents");
		$payComponents = $this->PayComponents->find('all', ['limit' => 200])
									// ->where(['PayComponents.id NOT IN'=>$componentarr])
									->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		
        $this->set(compact('payrollData', 'payComponents','empDataBiographies'));
        $this->set('_serialize', ['payrollData']);
		
		$payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$this->set('paycomponentarr', json_encode($payComponents));
		$this->set('paycomponentgrouparr', json_encode($payComponentGroups));
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
		
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
		
		$empDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
						->andwhere("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
						
		$emparr = $this->PayrollData->find('all')->select(['empdatabiographies_id'])->where(['PayrollData.customer_id='.$this->loggedinuser['customer_id']]);
        
        $excludingempDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
						->where(['EmpDataBiographies.id NOT IN'=>$emparr])
						->andwhere("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
		
		// $componentarr = $this->PayrollData->find('all')->select(['paycomponent'])->where(['PayrollData.pay_component_type=1'])
								 // ->andwhere(['PayrollData.empdatabiographies_id='.$this->loggedinuser['customer_id']])
								 // ->andwhere(['PayrollData.customer_id='.$this->loggedinuser['customer_id']]);
						
		$this->loadModel("PayComponents");
		$payComponents = $this->PayComponents->find('all', ['limit' => 200])
									// ->where(['PayComponents.id NOT IN'=>$componentarr])
									->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		
        $this->set(compact('payrollData', 'payComponents','empDataBiographies','excludingempDataBiographies'));
        $this->set('_serialize', ['payrollData']);
		
		$payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
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
		
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'alert']);			 
		}
		
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
		
        $emparr = $this->PayrollData->find('all')->select(['empdatabiographies_id'])->where(['PayrollData.empdatabiographies_id!='.$id])
        				->andwhere(['PayrollData.customer_id='.$this->loggedinuser['customer_id']]);
        
        $empDataBiographies = $this->PayrollData->EmpDataBiographies->find('list',['limit' => 200])
        				->select(['id'=>'EmpDataBiographies.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', EmpDataBiographies.employee_id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = EmpDataBiographies.employee_id')
						->where("EmpDataBiographies.customer_id=".$this->loggedinuser['customer_id']);
						
		$payComps = $this->PayrollData->find('all')->where("PayrollData.empdatabiographies_id=".$id)->andwhere("PayrollData.pay_component_type=1")
							->andwhere("PayrollData.customer_id=".$this->loggedinuser['customer_id'])->toArray();
							
		$payCompGroups = $this->PayrollData->find('all')->where("PayrollData.empdatabiographies_id=".$id)->andwhere("PayrollData.pay_component_type=2")
							->andwhere("PayrollData.customer_id=".$this->loggedinuser['customer_id']);
		
		$this->loadModel("PayComponents");
		$payComponents = $this->PayComponents->find('list', ['limit' => 200])
									// ->where(['end_date >= ' => date("Y/m/d")])
									->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        		
		$payComponentGroups = $this->PayComponents->PayComponentGroups->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
     
        $this->set('empDataBiographies', $empDataBiographies);
		
		
			
		$this->set('payComps',  json_encode($payComps));
		$this->set('payCompGroups',  json_encode($payCompGroups));
			
		$this->set('paycomponentarr', json_encode($payComponents));
		$this->set('paycomponentgrouparr', json_encode($payComponentGroups));		
			
		$this->set(compact('payrollData', 'payComponents','payComponentGroups'));
		
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
    	//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'index']);		 
		}
		
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
	public function deletegroup($id = null)
    {
    	
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 return $this->redirect(['action' => 'index']);			 
		}
		
        $this->request->allowMethod(['post', 'delete']);
		
		$splitarr = explode('^', $id);
		if(isset($splitarr[0]) && isset($splitarr[1])){
			if ($this->PayrollData->deleteAll(['paycomponentgroup' => $splitarr[0],'empdatabiographies_id'=>$splitarr[1],'customer_id'=>$this->loggedinuser['customer_id']])) {
            	$this->Flash->success(__('The payroll data has been deleted.'));
        	} else {
            	$this->Flash->error(__('The payroll data could not be deleted. Please, try again.'));
        	}
		}
		
        // $payrollData = $this->PayrollData->get(['paycomponentgroup'=>$id]);
        // if($payrollData['customer_id'] == $this->loggedinuser['customer_id']) 
		// {				
        	// if ($this->PayrollData->deleteAll(['paycomponentgroup' => $id,])) {
            	// $this->Flash->success(__('The payroll data has been deleted.'));
        	// } else {
            	// $this->Flash->error(__('The payroll data could not be deleted. Please, try again.'));
        	// }
		// }
	    // else
	    // {
	   	    // $this->Flash->error(__('You are not authorized'));
	    // }
        return $this->redirect(['action' => 'index']);
    }
	public function deleteAll($id=null){
    	
		//redirect if payroll locked for processing
		if(parent::masterLock()){			
			 $this->Flash->error(__('Payroll under processing.'));
			 $this->response->body("payrolllocked");
	    	 return $this->response;	 		 
		}
		
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
		/*	
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
		 * * 
		 */
             return $this->redirect(['action' => 'index']);	
		 
     }
}
