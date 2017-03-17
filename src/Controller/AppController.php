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
		
		Configure::write('userdf', $this->request->session()->read('sessionuser')['dateformat']);
		$userdf = $this->request->session()->read('sessionuser')['dateformat'];
		if(isset($userdf)  & $userdf===1){
			Date::setToStringFormat("dd/MM/yyyy"); 
			FrozenDate::setToStringFormat("dd/MM/yyyy"); 
		}
		
		$userrole=$this->request->session()->read('sessionuser')['role'];
		
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

    public function beforeFilter(Event $event)
    {
    	// $hours=['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'];
    	// $this->set('hours', $hours);
		
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

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
    	
		// print_r($this);
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
