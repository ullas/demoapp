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
	
	// public function GetData($columns,$data){
// 		
		// $out = array();
		// for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
			// $row = array();
			// for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
				// $column = $columns[$j];
				// if (isset( $column['alias'] )){
					// if ($column['alias']!= '' ){
						// $c = $column['alias'];
					// }else{
						// $c = $column['db'];
					// }	
				// }else{
					// $c = $column['db'];
				// }
// 				
				// // Is there a formatter?
				// if ( isset( $column['formatter'] ) ) {
					// $row[ $column['dt'] ] =  utf8_encode($column['formatter']( $data[$i][ $c ], $data[$i] ));
				// }
				// else {
					// $row[ $column['dt'] ] =  utf8_encode($data[$i][ $c ]);
				// }
			// }
			// $out[] = $row;
		// }
// 
		// return array(
			// "draw"            => intval( $this->request->query['draw'] ),
		 	// "recordsFiltered"    => count( $out ),
		 	// "recordsTotal" => count( $out ),
		 	// "data"            => $out
		 // );
	// }
	
	var $components = array('LoadCountry');
	
	public function isAuthorized($user)
	{
   		 // Admin can access every action
    	// if (isset($user['role']) && $user['role'] === 'admin') {
    	if (isset($user['role'])) {
    		$this->set('name', $user['name']);
			$this->set('userid', $user['id']);      
			$this->request->session()->write('sessionuser', $user);
			$this->loggedinuser=$user;
			
			$counts[]=array();
			//get customer count
			$this->loadModel('Customers');
			$counts['customer'] = $this->Customers->find('all')->count();
		
			//get legal entities count
			$this->loadModel('LegalEntities');
			$counts['legalentity'] = $this->LegalEntities->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get legal entities count
			$this->loadModel('BusinessUnits');
			$counts['businessunit'] = $this->BusinessUnits->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get legal entities count
			$this->loadModel('Departments');
			$counts['department'] = $this->Departments->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get legal entities count
			$this->loadModel('CostCentres');
			$counts['costcenter'] = $this->CostCentres->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get legal entities count
			$this->loadModel('Positions');
			$counts['position'] = $this->Positions->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			//get legal entities count
			$this->loadModel('EmpDataBiographies');
			$counts['employee'] = $this->EmpDataBiographies->find('all')->where(['customer_id'=>$user['customer_id']])->count();
			
			$this->set('counts', $counts);
		
		
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
				
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
