<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AbsenceQuota Controller
 *
 * @property \App\Model\Table\AbsenceQuotaTable $AbsenceQuota
 */
class AbsenceQuotaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'TimeTypes', 'Frequencies', 'Customers']
        ];
        $absenceQuota = $this->paginate($this->AbsenceQuota);

		($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;

        $this->set(compact('absenceQuota'));
        $this->set('_serialize', ['absenceQuota']);

		$dbout = $this->AbsenceQuota->find()->select(['employee_id'])
					->where(['AbsenceQuota.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['AbsenceQuota.customer_id' => '0'])->distinct()->toArray();
        $absencequota = array();//$this->Flash->error(__('The '.json_encode($dbout)));
        foreach($dbout as $value){

        	$absents = $this->AbsenceQuota->find('all')->where(['AbsenceQuota.employee_id' => $value['employee_id']])->andwhere(['AbsenceQuota.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			$absentlist = array();
        	foreach($absents as $childval){

				$this->loadModel('TimeTypes');
        	    $timetype=$this->TimeTypes->find()->select(['TimeTypes.name'])->where(['TimeTypes.id' => $childval['time_type_id']])->first();

				$this->loadModel('Frequencies');
        	    $frequency=$this->Frequencies->find()->select(['Frequencies.name'])->where(['Frequencies.id' => $childval['frequency_id']])->first();

				($childval['nxtexpiry']!="" && $childval['nxtexpiry']!=null) ? $nxtexpiry=$childval['nxtexpiry']->format($mptldateformat) : $nxtexpiry="";


				$absentlist[] = array("id"=>$childval['id'],"timetype" => $timetype['name'],"frequency" => $frequency['name'],"quota" => $childval['quota'],
						"balance" => $childval['balance'],"nxtexpiry" => $nxtexpiry);
			}
			$absencequota[] = array("empid" => $value['employee_id'], "empname"=>str_replace('"', '',parent::get_nameofemployee ($value['employee_id'])),
													 "absentchild" => $absentlist);
		}

        $this->set('content', $absencequota);
    }

    /**
     * View method
     *
     * @param string|null $id Absence Quotum id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $absenceQuotum = $this->AbsenceQuota->get($id, [
            'contain' => ['Employees', 'TimeTypes', 'Frequencies', 'Customers']
        ]);

        $this->set('absenceQuotum', $absenceQuotum);
        $this->set('_serialize', ['absenceQuotum']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $absenceQuotum = $this->AbsenceQuota->newEntity();
        if ($this->request->is('post')) {
            $absenceQuotum = $this->AbsenceQuota->patchEntity($absenceQuotum, $this->request->data);
            if ($this->AbsenceQuota->save($absenceQuotum)) {
                $this->Flash->success(__('The Absence Quotum has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Absence Quotum could not be saved. Please, try again.'));
            }
        }
        $employees = $this->AbsenceQuota->Employees->find('list',['limit' => 200])
        				->select(['id'=>'Employees.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', Employees.id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = Employees.id')
						->andwhere("Employees.visible="."1")
						->andwhere("Employees.customer_id=".$this->loggedinuser['customer_id']);
        $timeTypes = $this->AbsenceQuota->TimeTypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $frequencies = $this->AbsenceQuota->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->AbsenceQuota->Customers->find('list', ['limit' => 200]);
        $this->set(compact('absenceQuotum', 'employees', 'timeTypes', 'frequencies', 'customers'));
        $this->set('_serialize', ['absenceQuotum']);
    }
	public function addempdata($id = null)
    {
    	//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // return $this->redirect(['action' => 'alert']);
		// }

        $absenceQuotum = $this->AbsenceQuota->newEntity();
        if ($this->request->is('post')) {
            $absenceQuotum = $this->AbsenceQuota->patchEntity($absenceQuotum, $this->request->data);
			$absenceQuotum['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->AbsenceQuota->save($absenceQuotum)) {
                $this->Flash->success(__('The absence quota has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The absence quota could not be saved. Please, try again.'));
            }
        }
		$employees[$id]  = str_replace('"', '',parent::get_nameofemployee ($id));

        $timeTypes = $this->AbsenceQuota->TimeTypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $frequencies = $this->AbsenceQuota->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->AbsenceQuota->Customers->find('list', ['limit' => 200]);
        $this->set(compact('absenceQuotum', 'employees', 'timeTypes', 'frequencies', 'customers'));
        $this->set('_serialize', ['absenceQuotum']);
    }
	public function batchadd(){

		//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // return $this->redirect(['action' => 'alert']);
		// }

		$absenceQuotum = $this->AbsenceQuota->newEntity();


		$this->loadModel('PayGroups');
		$dbout = $this->PayGroups->find()->select(['PayGroups.id', 'PayGroups.name',])->where(['effective_status' => '0'])
					->andwhere(['PayGroups.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayGroups.customer_id' => '0'])->toArray();
        $paygrouplist = array();
        foreach($dbout as $value){

        	$jobinfos = $this->PayGroups->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $value['id'] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			$jobinfolist = array();
        	foreach($jobinfos as $childval){

				$jobinfolist[] = array("employee_id" => $childval['JobInfos']['employee_id'] );
			}

			$paygrouplist[] = array("parentid" => $value['id'] , "parent" => $value['name'] , "child" => $jobinfolist );
			// $this->Flash->error(__('DATA__.').json_encode($paygrouplist));


		}

        $this->set('paygrouplist', $paygrouplist);

		$this->loadModel('AbsenceQuota');
		$employees = $this->AbsenceQuota->Employees->find('list',['limit' => 200])
        				->select(['id'=>'Employees.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', Employees.id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = Employees.id')
						->andwhere("Employees.visible="."1")
						->andwhere("Employees.customer_id=".$this->loggedinuser['customer_id']);

        $timeTypes = $this->AbsenceQuota->TimeTypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $frequencies = $this->AbsenceQuota->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->AbsenceQuota->Customers->find('list', ['limit' => 200]);
        $this->set(compact('absenceQuotum', 'employees', 'timeTypes', 'frequencies', 'customers'));
	}
	public function addBatchData()
	{
		//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // return $this->redirect(['action' => 'alert','controller'=>'PayrollData']);
		// }

		if($this->request->is('ajax')) {

			$this->autoRender=false;

			$checkedpaygroups=json_decode($this->request->data['checkedarr']);
			for($k=0;$k<sizeof($checkedpaygroups);$k++) {

			$this->loadModel('JobInfos');
			$jobinfos = $this->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $checkedpaygroups[$k] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
        	foreach($jobinfos as $childval){

			$this->loadModel('AbsenceQuota');
			$absenceQuotum = $this->AbsenceQuota->newEntity();

            $absenceQuotum=$this->AbsenceQuota->patchEntity($absenceQuotum,$this->request->data);

			$absenceQuotum['employee_id']=$childval['employee_id'];
           	$absenceQuotum['time_type_id']=$this->request->data['time_type_id'];
			$absenceQuotum['frequency_id']=$this->request->data['frequency_id'];
            $absenceQuotum['quota']=$this->request->data['quota'];
			$absenceQuotum['balance']=$this->request->data['balance'];
			$absenceQuotum['nxtexpiry']=$this->request->data['nxtexpiry'];
			$absenceQuotum['expirylot']=$this->request->data['expirylot'];

			$absenceQuotum['customer_id']=$this->loggedinuser['customer_id'];

			$absenceQuotum['batch']=1;

			// $userdf = $this->request->session()->read('sessionuser')['dateformat'];
            // if(isset($userdf)  & $userdf===1){
				// foreach (["nxtexpiry"] as $value) {
					// if(isset($absenceQuotum[$value])){
						// if($absenceQuotum[$value]!=null && $absenceQuotum[$value]!='' && strpos($absenceQuotum[$value], '/') !== false){
							// $absenceQuotum[$value] = str_replace('/', '-', $absenceQuotum[$value]);
							// $absenceQuotum[$value]=date('Y/m/d', strtotime($absenceQuotum[$value]));
						// }
					// }
				// }
			// }


			//initiallly query
			$query=$this->AbsenceQuota->find('all', array('conditions' => array('employee_id'  => $absenceQuotum['employee_id'],
									'time_type_id'  =>$absenceQuotum['time_type_id'],'customer_id'  => $this->loggedinuser['customer_id']) ));

			foreach ($query as $row) {
				if($row['nxtexpiry']!=""  && $row['nxtexpiry']!=null){
					(isset($userdf)  & $userdf===1) ? $expirydate = $row['nxtexpiry']->format('d/m/Y') : $expirydate = $row['nxtexpiry']->format('m/d/Y');

					if($absenceQuotum['nxtexpiry']<=$expirydate){
						$this->response->body("Absence quota with the same timetype exists for ". str_replace('"', '',parent::get_nameofemployee ($absenceQuotum['employee_id'])) ."already with next expiry date as ".$expirydate.".Please check and try again.");
	    				return $this->response;
					}
				}
			}


				if ($this->AbsenceQuota->save($absenceQuotum)) {

            	} else {
                	$this->response->body("error");
	    			return $this->response;
            	}
            }

			if (($k+1)==sizeof($checkedpaygroups)) {
 				$this->response->body("success");
				return $this->response;
			}
		}

		}
	}
	public function batchdeleteQuota(){

		//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // $this->response->body("payrolllocked");
	    	 // return $this->response;
		// }

		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$checkedpaygroups=json_decode($this->request->data['checkedarr']);

			for($k=0;$k<sizeof($checkedpaygroups);$k++) {

				$this->loadModel('JobInfos');
				$jobinfos = $this->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $checkedpaygroups[$k] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();//$this->Flash->error(__('You are not Authorized.'.json_encode($jobinfos)));
        		foreach($jobinfos as $childval){

					$this->loadModel('AbsenceQuota');
					$count=$this->AbsenceQuota->find('all', array('conditions' => array('batch'=>TRUE,'employee_id' =>$childval["employee_id"],'time_type_id' => $this->request->data['timetypeid'] ) ))->count();
					if($count>0){
						if($this->AbsenceQuota->deleteAll(['employee_id' => $childval["employee_id"],'time_type_id' => $this->request->data['timetypeid'],'batch'=>TRUE])){

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
	public function copyEmployeesQuota(){

		//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // return $this->redirect(['action' => 'alert','controller'=>'PayrollData']);
		// }

		if($this->request->is('ajax')) {

			($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;

			$this->autoRender=false;
			$successcounter=0;$errorcounter=0;
			$oldempid = $this->request->data['oldemp'] ;
			$newempid = $this->request->data['newemp'] ;

			($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;

			if($oldempid!="" && $oldempid!=null && $newempid!="" && $newempid!=null){
				$dbdatas = $this->AbsenceQuota->find('all')->where(['AbsenceQuota.employee_id' => $oldempid ])
										->andwhere(['AbsenceQuota.customer_id' => $this->loggedinuser['customer_id']])->toArray();
        		foreach($dbdatas as $childval){

        			$this->loadModel('AbsenceQuota');
					$absenceQuotum = $this->AbsenceQuota->newEntity();

            		$absenceQuotum=$this->AbsenceQuota->patchEntity($absenceQuotum,$this->request->data);

					$absenceQuotum['employee_id']=$newempid;
           			$absenceQuotum['time_type_id']=$childval['time_type_id'];
					$absenceQuotum['frequency_id']=$childval['frequency_id'];
            		$absenceQuotum['quota']=$childval['quota'];
					$absenceQuotum['balance']=$childval['balance'];
					$absenceQuotum['nxtexpiry']=$childval['nxtexpiry']->format($mptldateformat);
					$absenceQuotum['expirylot']=$childval['expirylot'];

					$absenceQuotum['customer_id']=$this->loggedinuser['customer_id'];


            		if ($this->AbsenceQuota->save($absenceQuotum)) {
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
					$this->response->body("Error while copying Absence quota");
	    			return $this->response;
				}
			}

		}
	}
	public function batchremove(){

		//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // return $this->redirect(['action' => 'alert']);
		// }

		$absenceQuotum = $this->AbsenceQuota->newEntity();

		$this->loadModel('PayGroups');
		$dbout = $this->PayGroups->find()->select(['PayGroups.id', 'PayGroups.name',])->where(['effective_status' => '0'])
					->andwhere(['PayGroups.customer_id' => $this->loggedinuser['customer_id']])->orwhere(['PayGroups.customer_id' => '0'])->toArray();
        $paygrouplist = array();
        foreach($dbout as $value){

        	$jobinfos = $this->PayGroups->JobInfos->find()->select(['JobInfos.employee_id'])->where(['JobInfos.pay_group_id' => $value['id'] ])
        					->andwhere(['JobInfos.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			$jobinfolist = array();
        	foreach($jobinfos as $childval){
				$jobinfolist[] = array("employee_id" => $childval['JobInfos']['employee_id'] );
			}

			$paygrouplist[] = array("parentid" => $value['id'] , "parent" => $value['name'] , "child" => $jobinfolist );
		}

        $this->set('paygrouplist', $paygrouplist);

		($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;

		$this->loadModel('AbsenceQuota');
		$absents = $this->AbsenceQuota->find('all')->where(['batch' => TRUE])->distinct('time_type_id')->andwhere(['AbsenceQuota.customer_id' => $this->loggedinuser['customer_id']])->toArray();
		$absentlist = array();
        	foreach($absents as $childval){

				$this->loadModel('TimeTypes');
        	    $timetype=$this->TimeTypes->find()->select(['TimeTypes.name'])->where(['TimeTypes.id' => $childval['time_type_id']])->first();

				$this->loadModel('Frequencies');
        	    $frequency=$this->Frequencies->find()->select(['Frequencies.name'])->where(['Frequencies.id' => $childval['frequency_id']])->first();

				($childval['nxtexpiry']!="" && $childval['nxtexpiry']!=null) ? $nxtexpiry=$childval['nxtexpiry']->format($mptldateformat) : $nxtexpiry="";


				$absentlist[] = array("id"=>$childval['id'],"time_type_id"=>$childval['time_type_id'],"timetype" => $timetype['name'],"frequency" => $frequency['name'],"quota" => $childval['quota'],
						"balance" => $childval['balance'],"nxtexpiry" => $nxtexpiry);
			}

		$this->set('content', $absentlist);

	}
	public function copyempdata($id = null)
    {
    	//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // return $this->redirect(['action' => 'alert']);
		// }

		($this->daytimeFormat==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y' ;

    	$absenceQuotum = $this->AbsenceQuota->find('all')->where(['employee_id' => $id])->first();

		$absencequota=[];
    	$absents = $this->AbsenceQuota->find('all')->where(['AbsenceQuota.employee_id' => $id])->andwhere(['AbsenceQuota.customer_id' => $this->loggedinuser['customer_id']])->toArray();
			$absentlist = array();
        	foreach($absents as $childval){

				$this->loadModel('TimeTypes');
        	    $timetype=$this->TimeTypes->find()->select(['TimeTypes.name'])->where(['TimeTypes.id' => $childval['time_type_id']])->first();

				$this->loadModel('Frequencies');
        	    $frequency=$this->Frequencies->find()->select(['Frequencies.name'])->where(['Frequencies.id' => $childval['frequency_id']])->first();

				($childval['nxtexpiry']!="" && $childval['nxtexpiry']!=null) ? $nxtexpiry=$childval['nxtexpiry']->format($mptldateformat) : $nxtexpiry="";


				$absentlist[] = array("id"=>$childval['id'],"timetype" => $timetype['name'],"frequency" => $frequency['name'],"quota" => $childval['quota'],
						"balance" => $childval['balance'],"nxtexpiry" => $nxtexpiry);
			}
			$absencequota[] = array("empid" => $id, "empname"=>str_replace('"', '',parent::get_nameofemployee ($id)),
													 "absentchild" => $absentlist);

		$this->set('content', $absencequota);

		$emparr = $this->AbsenceQuota->find('all')->select(['employee_id'])->where(['AbsenceQuota.customer_id='.$this->loggedinuser['customer_id']]);
        $excludingemployees = $this->AbsenceQuota->Employees->find('list',['limit' => 200])
        				->select(['id'=>'Employees.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', Employees.id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = Employees.id')
						->where(['Employees.id NOT IN'=>$emparr])
						->andwhere("Employees.visible="."1")
						->andwhere("Employees.customer_id=".$this->loggedinuser['customer_id']);


		$this->set(compact('absenceQuotum', 'excludingemployees'));

    }
	public function addData()
	{
		//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // return $this->redirect(['action' => 'alert','controller'=>'PayrollData']);
		// }

		if($this->request->is('ajax')) {

			$this->autoRender=false;

			$absenceQuotum = $this->AbsenceQuota->newEntity();

            $absenceQuotum=$this->AbsenceQuota->patchEntity($absenceQuotum,$this->request->data);

			$absenceQuotum['employee_id']=$this->request->data['employee'];
           	$absenceQuotum['time_type_id']=$this->request->data['time_type_id'];
			$absenceQuotum['frequency_id']=$this->request->data['frequency_id'];
            $absenceQuotum['quota']=$this->request->data['quota'];
			$absenceQuotum['balance']=$this->request->data['balance'];
			$absenceQuotum['nxtexpiry']=$this->request->data['nxtexpiry'];
			$absenceQuotum['expirylot']=$this->request->data['expirylot'];

			$absenceQuotum['customer_id']=$this->loggedinuser['customer_id'];

			$userdf = $this->request->session()->read('sessionuser')['dateformat'];


			//initiallly query
			$query=$this->AbsenceQuota->find('all', array('conditions' => array('employee_id'  => $absenceQuotum['employee_id'],
									'time_type_id'  =>$absenceQuotum['time_type_id'],'customer_id'  => $this->loggedinuser['customer_id']) ));

			foreach ($query as $row) {
				if($row['nxtexpiry']!=""  && $row['nxtexpiry']!=null){
					(isset($userdf)  & $userdf===1) ? $expirydate = $row['nxtexpiry']->format('d/m/Y') : $expirydate = $row['nxtexpiry']->format('m/d/Y');

					if($absenceQuotum['nxtexpiry']<=$expirydate){
						$this->response->body("The Time Type has already been allocated and the Expiry Date is ".$expirydate.". Please check and try again.");
	    				return $this->response;
					}
				}
			}

			if($this->AbsenceQuota->save($absenceQuotum)) {
               	 $this->response->body("success");
	    		return $this->response;
            }else {
                $this->response->body("error");
	    		return $this->response;
            }
		}
	}
    /**
     * Edit method
     *
     * @param string|null $id Absence Quotum id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $absenceQuotum = $this->AbsenceQuota->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $absenceQuotum = $this->AbsenceQuota->patchEntity($absenceQuotum, $this->request->data);
            if ($this->AbsenceQuota->save($absenceQuotum)) {
                $this->Flash->success(__('The Absence Quotum has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Absence Quotum could not be saved. Please, try again.'));
            }
        }
        $employees = $this->AbsenceQuota->Employees->find('list',['limit' => 200])
        				->select(['id'=>'Employees.id','name' => 'CONCAT(EmpDataPersonals.first_name, \' \',EmpDataPersonals.last_name,\' (\', Employees.id, \')\' )'])
						->leftJoin('EmpDataPersonals', 'EmpDataPersonals.employee_id = Employees.id')
						->andwhere("Employees.visible="."1")
						->andwhere("Employees.customer_id=".$this->loggedinuser['customer_id']);
        $timeTypes = $this->AbsenceQuota->TimeTypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $frequencies = $this->AbsenceQuota->Frequencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $customers = $this->AbsenceQuota->Customers->find('list', ['limit' => 200]);
        $this->set(compact('absenceQuotum', 'employees', 'timeTypes', 'frequencies', 'customers'));
        $this->set('_serialize', ['absenceQuotum']);
    }
	public function empdeleteQuota(){

		//redirect if payroll locked for processing
		// if(parent::masterLock()){
			 // $this->Flash->error(__('Payroll under processing.'));
			 // $this->response->body("payrolllocked");
	    	 // return $this->response;
		// }

		if($this->request->is('ajax')) {

			$this->autoRender=false;

			$count=$this->AbsenceQuota->find('all', array('conditions' => array('employee_id'  => $this->request->data['empid']) ))->count();
			if($count>0){
				if($this->AbsenceQuota->deleteAll(['employee_id' => $this->request->data['empid']])){
					$this->response->body("success");
	    			return $this->response;
				}else{
					$this->response->body("error");
	    			return $this->response;
				}
			}
		}
	}
    /**
     * Delete method
     *
     * @param string|null $id Absence Quotum id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $absenceQuotum = $this->AbsenceQuota->get($id);
        if ($this->AbsenceQuota->delete($absenceQuotum)) {
            $this->Flash->success(__('The Absence Quotum has been deleted.'));
        } else {
            $this->Flash->error(__('The Absence Quotum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
