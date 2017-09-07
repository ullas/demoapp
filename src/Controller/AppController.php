<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\I18n\Time;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
use Cake\I18n\Date;
use Cake\Database\Type;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Inflector;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	protected $loggedinuser;
	public $daytimeFormat=1;
	
	var $components = array('LoadCountry');
	
	
	private function toPostDBDate($date){
		$ret="";
		$parts=explode("/",$date);
		if(count($parts)==3){
			$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);	
		}
	  return $ret;
	}
	
	public function isAuthorized($user)
	{
   		 // Admin can access every action
    	// if (isset($user['role']) && $user['role'] === 'admin') {
    	if (isset($user['role'])) {  
			
			//get empdatabiographyid from employeeid
			$this->loadModel('EmpDataBiographies');
			$emparr=$this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $user['employee_id']),'contain' => []])->toArray();
			isset($emparr[0]) ? $empdatabiographyid = $emparr[0]['id'] : $empdatabiographyid = "0" ; 
			
			//get profilepicture from employeeid
			$this->loadModel('Employees');
			$employeearr=$this->Employees->find('all',['conditions' => array('id' => $user['employee_id']),'contain' => []])->toArray();
			isset($employeearr[0]) ? $pic = $employeearr[0]['profilepicture'] : $pic = "defaultuser.png" ; 

		
    		$this->set('name', $user['name']);
			$this->set('userid', $user['id']);   
			$this->set('empid', $user['employee_id']);      
			$this->set('dateformat', $user['dateformat']);     
			$user["empdatabiographyid"] = $empdatabiographyid;
			$user["profilepic"] = $pic;
			$this->request->session()->write('sessionuser', $user);
			$this->loggedinuser=$user;
			
			$counts[]=array();
			//get customer count
			$this->loadModel('Customers');
			$counts['customer'] = $this->Customers->find('all')->count();
		
			//get legal entities count
			$this->loadModel('LegalEntities');
			$counts['legalentity'] = $this->LegalEntities->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get business units count
			$this->loadModel('BusinessUnits');
			$counts['businessunit'] = $this->BusinessUnits->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get division count
			$this->loadModel('Divisions');
			$counts['division'] = $this->Divisions->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get department count
			$this->loadModel('Departments');
			$counts['department'] = $this->Departments->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get costcenter count
			$this->loadModel('CostCentres');
			$counts['costcenter'] = $this->CostCentres->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get position count
			$this->loadModel('Positions');
			$counts['position'] = $this->Positions->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get employee count
			// $this->loadModel('EmpDataBiographies');
			// $counts['employee'] = $this->EmpDataBiographies->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			$this->set('counts', $counts);
			$this->counts=$counts;
		
        	return true;
    	}

    	// Default deny
    	return false;
	}

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
     public function initialize()
	{
    	parent::initialize();

		// $this->set('form_templates', Configure::read('Templates'));
		
    	$this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		
		$userrole=$this->request->session()->read('sessionuser')['role'];
		
		//dateformat
		$dtfd_id=$this->request->session()->read('sessionuser')['dateformat'];
		if($dtfd_id==1){
			$this->daytimeFormat=1;
		}else{
			$this->daytimeFormat=2;
		}	
		$table = TableRegistry::get($this->modelClass);	//debug($this->modelClass);
		$table->addBehavior("Dateformat",[$this->daytimeFormat]);
		
		
		//also load datetime behaviour for associated models
		$assModels=$table->associations()->keys();
	   	foreach($assModels as $asskeys){
		   	$table->$asskeys->addBehavior("Dateformat",[$this->daytimeFormat]);
	   	}
		
		
		if($userrole == "root"){
			$this->loadComponent('Auth', [
        	'authorize' => ['Controller'], // Added this line
        	'loginRedirect' => [
            	'controller' => 'Customers',
            	'action' => 'index'
        	],
        	'logoutRedirect' => [
            	'controller' => 'Users',
            	'action' => 'login',
        	]
    	]);
		}else{
			$this->loadComponent('Auth', [
        	'authorize' => ['Controller'], // Added this line
        	'loginRedirect' => [
            	'controller' => 'Homes',
            	'action' => 'index'
        	],
        	'logoutRedirect' => [
            	'controller' => 'Users',
            	'action' => 'login',
        	]
    	]);
		}
		
		
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
	public function masterLock()
    {
    	$this->loadModel('Customers');
		$customers=$this->Customers->find()->select(['Customers.payroll_lock'])->where(['Customers.id' => $this->loggedinuser['customer_id']])->first();	
		if(isset($customers['payroll_lock']) && ($customers['payroll_lock']==true || $customers['payroll_lock']==TRUE)){
			return true; 
		}
		return false;
	}
    public function afterFilter(Event $event)
    {
		// debug($event);
	}
	public function beforeFilter(Event $event)
    {//debug($this->data);
		parent::beforeFilter($event);
		
		$this->Auth->deny(['add', 'edit']);	
		
		$userrole=$this->request->session()->read('sessionuser')['role'];
		
		switch ($userrole) {
			case "admin":
				$adminarray=["Homes","LegalEntities","BusinessUnits"];
        		foreach ($adminarray as $value) {
        			// print_r($value);
        		}
				break;
			default:
				break;
		}
		
    }
	public function mptlFormatDate($value){
		if($this->daytimeFormat==1){
			$output=explode($val,"-");
			$fnl=$output[2]. "-" . $output[1] . "-". $output[0];
		}else{
			$output=explode($val,"-");
			$fnl=$output[1]. "-" . $output[2] . "-". $output[0];	
		}
		return $fnl;
	}
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
    	if($this->daytimeFormat==1){
			$mptldateformat='d/m/Y';
			$mptldatetimeformat='d/m/Y H:m a';
		}else{
			$mptldateformat='m/d/Y';
			$mptldatetimeformat='m/d/Y H:m a';
		}
		$this->set('mptldateformat', $mptldateformat);
		$this->set('mptldatetimeformat', $mptldatetimeformat);
		
		
		// $table = TableRegistry::get("EmploymentInfos");	//debug($this->modelClass);
		// $table->addBehavior("Dateformat",[$this->daytimeFormat]);
		
		
    	//get position id 
    	$jobinfosTable = TableRegistry::get('JobInfos');	
		$query=$jobinfosTable->find('All')->where(['employee_id'=>$this->request->session()->read('sessionuser')['employee_id']])->toArray();
		(isset($query[0])) ? $mypositionid=$query[0]['position_id'] : $mypositionid="0";
		
		//get distinct workflowruleid having the particular position id
		$workflowactionsTable = TableRegistry::get('Workflowactions');
		$query = $workflowactionsTable->find('All')->where(['position_id'=>$mypositionid])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]) ->distinct(['workflowrule_id']);
		
		// Iterating the query.
		$lcontent=array();
		foreach ($query as $row) {	
			$workflowsTable = TableRegistry::get('Workflows');
			$execquery = $workflowsTable->find('All')->where(['workflowrule_id'=>$row['workflowrule_id']])->andwhere(['currentstep'=>$row['stepid']])->andwhere(['Workflows.active'=>"0"])
								// ->andwhere(['EmployeeAbsencerecords.id IS NOT NULL'])
								->andwhere(['Workflows.customer_id'=>$this->loggedinuser['customer_id']])->contain(['EmpDataBiographies','EmployeeAbsencerecords'=> ['TimeTypes'],'Workflowrules'])
								->leftJoin('EmpDataBiographies', 'EmpDataBiographies.workflow_id = Workflows.id')
         						->toArray();
			foreach($execquery as $absquery){
				if(isset($absquery) && $absquery!=null && isset($absquery['employee_absencerecords']) && ($absquery['employee_absencerecords'])!=null) { array_push($lcontent,$absquery); };
			}
			
		}
		$this->set('notificationcontent', $lcontent);
		 
		//leave status
		$this->loadModel('AbsenceQuota');
		$absencearr=$this->AbsenceQuota->find('all',['conditions' => array('employee_id' => $this->request->session()->read('sessionuser')['employee_id'])])->distinct(['time_type_id'])->toArray();
		$myleaves=[];
		foreach($absencearr as $abschildval){
			$leavestatusarr=[];
			$this->loadModel('TimeTypes');
			$timetype=$this->TimeTypes->find('all',['conditions' => array('id' => $abschildval['time_type_id']), 'contain' => []])->first();
			
			$this->loadModel('EmployeeAbsencerecords');
			$query=$this->EmployeeAbsencerecords->find('All')->where(['emp_data_biographies_id'=>$this->request->session()->read('sessionuser')['empdatabiographyid']])
						->andwhere(['time_type_id'=>$abschildval['time_type_id']])->andwhere(['status'=>'1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			(isset($query)) ? $leavecount=$query->count() : $leavecount=0;
		
		
			$leavestatusarr['timetype']=$timetype['name'];$leavestatusarr['quota']=$abschildval['quota'];$leavestatusarr['leavecount']=$leavecount;
		
			$myleaves[]=$leavestatusarr;
		}
		$this->set('jsonencodedmyleaves', json_encode($myleaves));$this->set('myleaves', $myleaves);
		
		$positionsTable = TableRegistry::get('Positions');	
		$query=$positionsTable->find('All')->where(['id'=>$mypositionid])->toArray();
		(isset($query[0])) ? $myposition=$query[0]['name'] : $myposition="0";
		$this->set('myposition', $myposition);

    	$this->viewBuilder()->theme('AdminLTE');
		$this->set('theme', Configure::read('Theme'));
			
		$this->set('mptlusercurrencyfaclass',"fa fa-rupee");
		$this->set('mptlusercalendarfaclass',"fa fa-calendar");
				
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
