<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 */
class EmployeesController extends AppController
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
		$contains=['Empdatabiographies'=> ['Positions'], 'Empdatapersonals', 'Employmentinfos', 'ContactInfos', 'Addresses','Identities','Jobinfos'];
									  
		$usrfilter="Employees.customer_id ='".$this->loggedinuser['customer_id'] . "' and Employees.visible='1'";						  
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);	
    }
    public function index()
    {
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);	
        // $this->set('_serialize', ['configs']);
		 
		$this->paginate = [
            'contain' => ['Empdatabiographies'=> ['Positions'], 'Empdatapersonals', 'Employmentinfos','Customers', 'ContactInfos', 'Addresses','Identities','Jobinfos']
        ];
		
        $employees = $this->paginate($this->Employees->find('all')->where(['Employees.visible' => 1])->andwhere(['Employees.customer_id' => $this->loggedinuser['customer_id'] ]));

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);	
		$positions = $this->Employees->JobInfos->Positions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	 
        $this->set(compact('employees','positions'));
        $this->set('_serialize', ['employees']);//$this->Flash->success(__('The ---'.json_encode($employees)));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos', 'Addresses','Identities','Jobinfos']
        ]);
		if($employee['customer_id']==$this->loggedinuser['customer_id'] && $employee['visible']=='1'){
        	$payGroups = $this->Employees->JobInfos->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$positions = $this->Employees->JobInfos->Positions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$businessUnits = $this->Employees->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$divisions = $this->Employees->JobInfos->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$costCentres = $this->Employees->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$payGrades = $this->Employees->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$locations = $this->Employees->JobInfos->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$departments = $this->Employees->JobInfos->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$legalEntities = $this->Employees->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$holidayCalendars = $this->Employees->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
			$workSchedules = $this->Employees->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
			$timeTypeProfiles = $this->Employees->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        	$this->set(compact('payGroups','positions', 'employee', 'customers', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));
        
        	$this->set('_serialize', ['employee']);
			
			
			$identityid=0;
			if(isset($employee['identity']['id'])){
				$identityid=$employee['identity']['id'];
			}

			$ids = $this->Employees->Identities->find('all')->where("Identities.employee_id=".$id)->andwhere("Identities.id!=".$identityid)
							->andwhere("Identities.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('ids', json_encode($ids));
			
		}else{
		    $this->Flash->error(__('You are not Authorized.'));
			return $this->redirect(['action' => 'index']);
       }
		$countries = array('AF'=>'Afghanistan','AL'=>'Albania','DZ'=>'Algeria','AS'=>'American Samoa','AD'=>'Andorra','AO'=>'Angola','AI'=>'Anguilla','AQ'=>'Antarctica','AG'=>'Antigua And Barbuda','AR'=>'Argentina','AM'=>'Armenia','AW'=>'Aruba','AU'=>'Australia','AT'=>'Austria','AZ'=>'Azerbaijan','BS'=>'Bahamas','BH'=>'Bahrain','BD'=>'Bangladesh','BB'=>'Barbados','BY'=>'Belarus','BE'=>'Belgium','BZ'=>'Belize','BJ'=>'Benin','BM'=>'Bermuda','BT'=>'Bhutan','BO'=>'Bolivia','BA'=>'Bosnia And Herzegovina','BW'=>'Botswana','BV'=>'Bouvet Island','BR'=>'Brazil','IO'=>'British Indian Ocean Territory','BN'=>'Brunei','BG'=>'Bulgaria','BF'=>'Burkina Faso','BI'=>'Burundi','KH'=>'Cambodia','CM'=>'Cameroon','CA'=>'Canada','CV'=>'Cape Verde','KY'=>'Cayman Islands','CF'=>'Central African Republic','TD'=>'Chad','CL'=>'Chile','CN'=>'China','CX'=>'Christmas Island','CC'=>'Cocos (Keeling) Islands','CO'=>'Columbia','KM'=>'Comoros','CG'=>'Congo','CK'=>'Cook Islands','CR'=>'Costa Rica','CI'=>'Cote DIvorie (Ivory Coast)','HR'=>'Croatia (Hrvatska)','CU'=>'Cuba','CY'=>'Cyprus','CZ'=>'Czech Republic','CD'=>'Democratic Republic Of Congo (Zaire)','DK'=>'Denmark','DJ'=>'Djibouti','DM'=>'Dominica','DO'=>'Dominican Republic','TP'=>'East Timor','EC'=>'Ecuador','EG'=>'Egypt','SV'=>'El Salvador','GQ'=>'Equatorial Guinea','ER'=>'Eritrea','EE'=>'Estonia','ET'=>'Ethiopia','FK'=>'Falkland Islands (Malvinas)','FO'=>'Faroe Islands','FJ'=>'Fiji','FI'=>'Finland','FR'=>'France','GF'=>'French Guinea','PF'=>'French Polynesia','TF'=>'French Southern Territories','GA'=>'Gabon','GM'=>'Gambia','GE'=>'Georgia','DE'=>'Germany','GH'=>'Ghana','GI'=>'Gibraltar','GR'=>'Greece','GL'=>'Greenland','GD'=>'Grenada','GP'=>'Guadeloupe','GU'=>'Guam','GT'=>'Guatemala','GN'=>'Guinea','GW'=>'Guinea-Bissau','GY'=>'Guyana','HT'=>'Haiti','HM'=>'Heard And McDonald Islands','HN'=>'Honduras','HK'=>'Hong Kong','HU'=>'Hungary','IS'=>'Iceland','IN'=>'India','ID'=>'Indonesia','IR'=>'Iran','IQ'=>'Iraq','IE'=>'Ireland','IL'=>'Israel','IT'=>'Italy','JM'=>'Jamaica','JP'=>'Japan','JO'=>'Jordan','KZ'=>'Kazakhstan','KE'=>'Kenya','KI'=>'Kiribati','KW'=>'Kuwait','KG'=>'Kyrgyzstan','LA'=>'Laos','LV'=>'Latvia','LB'=>'Lebanon','LS'=>'Lesotho','LR'=>'Liberia','LY'=>'Libya','LI'=>'Liechtenstein','LT'=>'Lithuania','LU'=>'Luxembourg','MO'=>'Macau','MK'=>'Macedonia','MG'=>'Madagascar','MW'=>'Malawi','MY'=>'Malaysia','MV'=>'Maldives','ML'=>'Mali','MT'=>'Malta','MH'=>'Marshall Islands','MQ'=>'Martinique','MR'=>'Mauritania','MU'=>'Mauritius','YT'=>'Mayotte','MX'=>'Mexico','FM'=>'Micronesia','MD'=>'Moldova','MC'=>'Monaco','MN'=>'Mongolia','MS'=>'Montserrat','MA'=>'Morocco','MZ'=>'Mozambique','MM'=>'Myanmar (Burma)','NA'=>'Namibia','NR'=>'Nauru','NP'=>'Nepal','NL'=>'Netherlands','AN'=>'Netherlands Antilles','NC'=>'New Caledonia','NZ'=>'New Zealand','NI'=>'Nicaragua','NE'=>'Niger','NG'=>'Nigeria','NU'=>'Niue','NF'=>'Norfolk Island','KP'=>'North Korea','MP'=>'Northern Mariana Islands','NO'=>'Norway','OM'=>'Oman','PK'=>'Pakistan','PW'=>'Palau','PA'=>'Panama','PG'=>'Papua New Guinea','PY'=>'Paraguay','PE'=>'Peru','PH'=>'Philippines','PN'=>'Pitcairn','PL'=>'Poland','PT'=>'Portugal','PR'=>'Puerto Rico','QA'=>'Qatar','RE'=>'Reunion','RO'=>'Romania','RU'=>'Russia','RW'=>'Rwanda','SH'=>'Saint Helena','KN'=>'Saint Kitts And Nevis','LC'=>'Saint Lucia','PM'=>'Saint Pierre And Miquelon','VC'=>'Saint Vincent And The Grenadines','SM'=>'San Marino','ST'=>'Sao Tome And Principe','SA'=>'Saudi Arabia','SN'=>'Senegal','SC'=>'Seychelles','SL'=>'Sierra Leone','SG'=>'Singapore','SK'=>'Slovak Republic','SI'=>'Slovenia','SB'=>'Solomon Islands','SO'=>'Somalia','ZA'=>'South Africa','GS'=>'South Georgia And South Sandwich Islands','KR'=>'South Korea','ES'=>'Spain','LK'=>'Sri Lanka','SD'=>'Sudan','SR'=>'Suriname','SJ'=>'Svalbard And Jan Mayen','SZ'=>'Swaziland','SE'=>'Sweden','CH'=>'Switzerland','SY'=>'Syria','TW'=>'Taiwan','TJ'=>'Tajikistan','TZ'=>'Tanzania','TH'=>'Thailand','TG'=>'Togo','TK'=>'Tokelau','TO'=>'Tonga','TT'=>'Trinidad And Tobago','TN'=>'Tunisia','TR'=>'Turkey','TM'=>'Turkmenistan','TC'=>'Turks And Caicos Islands','TV'=>'Tuvalu','UG'=>'Uganda','UA'=>'Ukraine','AE'=>'United Arab Emirates','GB'=>'United Kingdom','US'=>'United States','UM'=>'United States Minor Outlying Islands','UY'=>'Uruguay','UZ'=>'Uzbekistan','VU'=>'Vanuatu','VA'=>'Vatican City (Holy See)','VE'=>'Venezuela','VN'=>'Vietnam','VG'=>'Virgin Islands (British)','VI'=>'Virgin Islands (US)','WF'=>'Wallis And Futuna Islands','EH'=>'Western Sahara','WS'=>'Western Samoa','YE'=>'Yemen','YU'=>'Yugoslavia','ZM'=>'Zambia','ZW'=>'Zimbabwe');
        $this->set('countryarr', json_encode($countries));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data,['associated' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos','Jobinfos', 'Customers', 'ContactInfos', 'Addresses','Identities']]);
			$employee['visible']="1";
			$employee['profilepicture']=$employee['employee']['profilepicture'];
			//saving customer_id to all associated models
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			$employee['empdatabiography']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['empdatapersonal']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['employmentinfo']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['jobinfo']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['contact_info']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['address']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['identity']['customer_id']=$this->loggedinuser['customer_id'];
			
			$employee['empdatabiography']['position_id']=$employee['jobinfo']['position_id'];
			
            if ($this->Employees->save($employee)) {
                	
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
		
		$positions="";
		$rslt=$this->Employees->getExcludedPositions();  
		foreach($rslt as $key =>$value){
			$positions[$value['id']]=$value['name'];
		}

        // $positions = $this->Employees->JobInfos->Positions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->Employees->JobInfos->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->Employees->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->Employees->JobInfos->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->Employees->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->Employees->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->Employees->JobInfos->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Employees->JobInfos->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $legalEntities = $this->Employees->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidayCalendars = $this->Employees->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$workSchedules = $this->Employees->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$timeTypeProfiles = $this->Employees->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        $this->set(compact('payGroups','positions', 'employee', 'customers', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));
        $this->set('_serialize', ['employee']);
		
		$countries = array('AF'=>'Afghanistan','AL'=>'Albania','DZ'=>'Algeria','AS'=>'American Samoa','AD'=>'Andorra','AO'=>'Angola','AI'=>'Anguilla','AQ'=>'Antarctica','AG'=>'Antigua And Barbuda','AR'=>'Argentina','AM'=>'Armenia','AW'=>'Aruba','AU'=>'Australia','AT'=>'Austria','AZ'=>'Azerbaijan','BS'=>'Bahamas','BH'=>'Bahrain','BD'=>'Bangladesh','BB'=>'Barbados','BY'=>'Belarus','BE'=>'Belgium','BZ'=>'Belize','BJ'=>'Benin','BM'=>'Bermuda','BT'=>'Bhutan','BO'=>'Bolivia','BA'=>'Bosnia And Herzegovina','BW'=>'Botswana','BV'=>'Bouvet Island','BR'=>'Brazil','IO'=>'British Indian Ocean Territory','BN'=>'Brunei','BG'=>'Bulgaria','BF'=>'Burkina Faso','BI'=>'Burundi','KH'=>'Cambodia','CM'=>'Cameroon','CA'=>'Canada','CV'=>'Cape Verde','KY'=>'Cayman Islands','CF'=>'Central African Republic','TD'=>'Chad','CL'=>'Chile','CN'=>'China','CX'=>'Christmas Island','CC'=>'Cocos (Keeling) Islands','CO'=>'Columbia','KM'=>'Comoros','CG'=>'Congo','CK'=>'Cook Islands','CR'=>'Costa Rica','CI'=>'Cote DIvorie (Ivory Coast)','HR'=>'Croatia (Hrvatska)','CU'=>'Cuba','CY'=>'Cyprus','CZ'=>'Czech Republic','CD'=>'Democratic Republic Of Congo (Zaire)','DK'=>'Denmark','DJ'=>'Djibouti','DM'=>'Dominica','DO'=>'Dominican Republic','TP'=>'East Timor','EC'=>'Ecuador','EG'=>'Egypt','SV'=>'El Salvador','GQ'=>'Equatorial Guinea','ER'=>'Eritrea','EE'=>'Estonia','ET'=>'Ethiopia','FK'=>'Falkland Islands (Malvinas)','FO'=>'Faroe Islands','FJ'=>'Fiji','FI'=>'Finland','FR'=>'France','GF'=>'French Guinea','PF'=>'French Polynesia','TF'=>'French Southern Territories','GA'=>'Gabon','GM'=>'Gambia','GE'=>'Georgia','DE'=>'Germany','GH'=>'Ghana','GI'=>'Gibraltar','GR'=>'Greece','GL'=>'Greenland','GD'=>'Grenada','GP'=>'Guadeloupe','GU'=>'Guam','GT'=>'Guatemala','GN'=>'Guinea','GW'=>'Guinea-Bissau','GY'=>'Guyana','HT'=>'Haiti','HM'=>'Heard And McDonald Islands','HN'=>'Honduras','HK'=>'Hong Kong','HU'=>'Hungary','IS'=>'Iceland','IN'=>'India','ID'=>'Indonesia','IR'=>'Iran','IQ'=>'Iraq','IE'=>'Ireland','IL'=>'Israel','IT'=>'Italy','JM'=>'Jamaica','JP'=>'Japan','JO'=>'Jordan','KZ'=>'Kazakhstan','KE'=>'Kenya','KI'=>'Kiribati','KW'=>'Kuwait','KG'=>'Kyrgyzstan','LA'=>'Laos','LV'=>'Latvia','LB'=>'Lebanon','LS'=>'Lesotho','LR'=>'Liberia','LY'=>'Libya','LI'=>'Liechtenstein','LT'=>'Lithuania','LU'=>'Luxembourg','MO'=>'Macau','MK'=>'Macedonia','MG'=>'Madagascar','MW'=>'Malawi','MY'=>'Malaysia','MV'=>'Maldives','ML'=>'Mali','MT'=>'Malta','MH'=>'Marshall Islands','MQ'=>'Martinique','MR'=>'Mauritania','MU'=>'Mauritius','YT'=>'Mayotte','MX'=>'Mexico','FM'=>'Micronesia','MD'=>'Moldova','MC'=>'Monaco','MN'=>'Mongolia','MS'=>'Montserrat','MA'=>'Morocco','MZ'=>'Mozambique','MM'=>'Myanmar (Burma)','NA'=>'Namibia','NR'=>'Nauru','NP'=>'Nepal','NL'=>'Netherlands','AN'=>'Netherlands Antilles','NC'=>'New Caledonia','NZ'=>'New Zealand','NI'=>'Nicaragua','NE'=>'Niger','NG'=>'Nigeria','NU'=>'Niue','NF'=>'Norfolk Island','KP'=>'North Korea','MP'=>'Northern Mariana Islands','NO'=>'Norway','OM'=>'Oman','PK'=>'Pakistan','PW'=>'Palau','PA'=>'Panama','PG'=>'Papua New Guinea','PY'=>'Paraguay','PE'=>'Peru','PH'=>'Philippines','PN'=>'Pitcairn','PL'=>'Poland','PT'=>'Portugal','PR'=>'Puerto Rico','QA'=>'Qatar','RE'=>'Reunion','RO'=>'Romania','RU'=>'Russia','RW'=>'Rwanda','SH'=>'Saint Helena','KN'=>'Saint Kitts And Nevis','LC'=>'Saint Lucia','PM'=>'Saint Pierre And Miquelon','VC'=>'Saint Vincent And The Grenadines','SM'=>'San Marino','ST'=>'Sao Tome And Principe','SA'=>'Saudi Arabia','SN'=>'Senegal','SC'=>'Seychelles','SL'=>'Sierra Leone','SG'=>'Singapore','SK'=>'Slovak Republic','SI'=>'Slovenia','SB'=>'Solomon Islands','SO'=>'Somalia','ZA'=>'South Africa','GS'=>'South Georgia And South Sandwich Islands','KR'=>'South Korea','ES'=>'Spain','LK'=>'Sri Lanka','SD'=>'Sudan','SR'=>'Suriname','SJ'=>'Svalbard And Jan Mayen','SZ'=>'Swaziland','SE'=>'Sweden','CH'=>'Switzerland','SY'=>'Syria','TW'=>'Taiwan','TJ'=>'Tajikistan','TZ'=>'Tanzania','TH'=>'Thailand','TG'=>'Togo','TK'=>'Tokelau','TO'=>'Tonga','TT'=>'Trinidad And Tobago','TN'=>'Tunisia','TR'=>'Turkey','TM'=>'Turkmenistan','TC'=>'Turks And Caicos Islands','TV'=>'Tuvalu','UG'=>'Uganda','UA'=>'Ukraine','AE'=>'United Arab Emirates','GB'=>'United Kingdom','US'=>'United States','UM'=>'United States Minor Outlying Islands','UY'=>'Uruguay','UZ'=>'Uzbekistan','VU'=>'Vanuatu','VA'=>'Vatican City (Holy See)','VE'=>'Venezuela','VN'=>'Vietnam','VG'=>'Virgin Islands (British)','VI'=>'Virgin Islands (US)','WF'=>'Wallis And Futuna Islands','EH'=>'Western Sahara','WS'=>'Western Samoa','YE'=>'Yemen','YU'=>'Yugoslavia','ZM'=>'Zambia','ZW'=>'Zimbabwe');
        $this->set('countryarr', json_encode($countries));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function deleteAllIds()
	{
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;	
			$this->loadModel('Identities');		
			//initially delete the particular employees data
			$this->Identities->deleteAll(['employee_id' => $this->request->query['employee']]);
			
		}
	}
	public function addEmployee(){
    	
    	if($this->request->is('ajax')) {
				
			$this->autoRender=false;		
			
			$employee = $this->Employees->newEntity();
        	$employee = $this->Employees->patchEntity($employee, $this->request->data,['associated' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos','Jobinfos', 'Customers', 'ContactInfos', 'Addresses','Identities']]);
			$employee['visible']="1";
			$employee['profilepicture']=$employee['employee']['profilepicture'];
			//saving customer_id to all associated models
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			$employee['empdatabiography']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['empdatapersonal']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['employmentinfo']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['jobinfo']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['contact_info']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['address']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['identity']['customer_id']=$this->loggedinuser['customer_id'];
			
			$employee['empdatabiography']['position_id']=$employee['jobinfo']['position_id'];
			
            if ($this->Employees->save($employee)) {
                	
                $this->Flash->success(__('The employee has been saved.'));
                $this->response->body($employee['id']);
	    		return $this->response;
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
		}
	}
    public function addIds(){
    	
    	if($this->request->is('ajax')) {
				
			$this->autoRender=false;		
			
			$this->loadModel('Identities');		
			$identity = $this->Identities->newEntity();
			$identity=$this->Identities->patchEntity($identity,$this->request->data);
            $identity['customer_id']=$this->loggedinuser['customer_id'];
			$identity['employee_id']=$this->request->query['empid'];
           	$identity['card_type']=$this->request->query['idtype'];
			$identity['country']=$this->request->query['country'];
            $identity['nationalid']=$this->request->query['nationalid'];
			$identity['is_primary']=$this->request->query['isprimary'];
			$identity['issuedate']=$this->request->query['issuedate'];
			$identity['expirydate']=$this->request->query['expirydate'];
            
			
			
			
			if ($this->Identities->save($identity)) {

               	 	$this->response->body("success");$this->Flash->success(__('o/p::.'.json_encode($identity)));
	    			return $this->response;
            } else {
                	$this->response->body("errormp");
	    			return $this->response;
            }			
		}
    }
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos', 'Addresses','Identities', 'Jobinfos']
        ]);
		
		if($employee['customer_id'] != $this->loggedinuser['customer_id'] || $employee['visible'] != '1')
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}	 
			 
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			
            if ($this->Employees->save($employee)) {
            	
				
				//associated Empdatapersonals
            		$this->loadModel('EmpDataPersonals');
					$arr = $this->EmpDataPersonals->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataPersonal = $arr[0] : $empDataPersonal = $this->EmpDataPersonals->newEntity();  
					// $empDataPersonal = $arr[0];
					$empDataPersonal = $this->EmpDataPersonals->patchEntity($empDataPersonal, $this->request->data['empdatapersonal']);
            		if ($this->Employees->EmpDataPersonals->save($empDataPersonal)) {
                			
                	}

					//associated EmpDataBiographies
            		$this->loadModel('EmploymentInfos');
					$arr = $this->EmploymentInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $employmentinfo = $arr[0] : $employmentinfo = $this->EmploymentInfos->newEntity();  						
					// $employmentinfo = $arr[0];
					$employmentinfo = $this->EmploymentInfos->patchEntity($employmentinfo, $this->request->data['employmentinfo']);
            		if ($this->Employees->EmploymentInfos->save($employmentinfo)) {
                			
               		}	
						
					//associated Contact Infos
            		$this->loadModel('ContactInfos');
					$arr = $this->ContactInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $contactinfo = $arr[0] : $contactinfo = $this->ContactInfos->newEntity();  						
					// $contactinfo = $arr[0];
					$contactinfo = $this->ContactInfos->patchEntity($contactinfo, $this->request->data['contact_info']);
					$contactinfo['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->ContactInfos->save($contactinfo)) {
                			
            		}
					//associated JobInfos
            		$this->loadModel('JobInfos');
					$arr = $this->JobInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $jobinfo = $arr[0] : $jobinfo = $this->JobInfos->newEntity();  						
					// $jobinfo = $arr[0];
					$jobinfo = $this->JobInfos->patchEntity($jobinfo, $this->request->data['jobinfo']);
					$jobinfo['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->JobInfos->save($jobinfo)) {
                			
            		}
					
					//associated EmpDataBiographies
            		$this->loadModel('EmpDataBiographies');
					$arr = $this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataBiography = $arr[0] : $empDataBiography = $this->EmpDataBiographies->newEntity();  			
					$empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data['empdatabiography']);
					$empDataBiography['position_id']=$jobinfo['position_id'];
            		if ($this->Employees->EmpDataBiographies->save($empDataBiography)) {
              
					}
				
					//associated Addresses
            		$this->loadModel('Addresses');
					$arr = $this->Addresses->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $address = $arr[0] : $address = $this->Addresses->newEntity();  						
					$address = $this->Addresses->patchEntity($address, $this->request->data['address']);
					$address['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->Addresses->save($address)) {
                			
            		}
					//associated Identities
            		$this->loadModel('Identities');
					$arr = $this->Identities->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $identity = $arr[0] : $identity = $this->Identities->newEntity();  						
					// $identity = $arr[0];
					$identity = $this->Identities->patchEntity($identity, $this->request->data['identity']);
					$identity['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->Identities->save($identity)) {
                			
            		}
						
				$this->Flash->success(__('The employee has been saved.'));
				return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
		
		$this->set('id', $id);
		
		$rslt=$this->Employees->getIncludedPositions($id);  
		foreach($rslt as $key =>$value){
			$positions[$value['id']]=$value['name'];
		}
		// $this->log($positions);
		
		
		// $positions = $this->Employees->JobInfos->Positions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->Employees->JobInfos->PayGroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->Employees->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->Employees->JobInfos->Divisions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->Employees->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->Employees->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->Employees->JobInfos->Locations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Employees->JobInfos->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $legalEntities = $this->Employees->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidayCalendars = $this->Employees->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$workSchedules = $this->Employees->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$timeTypeProfiles = $this->Employees->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        $this->set(compact('payGroups','positions', 'employee', 'customers', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));
        $this->set('_serialize', ['employee']);
		
		$countries = array('AF'=>'Afghanistan','AL'=>'Albania','DZ'=>'Algeria','AS'=>'American Samoa','AD'=>'Andorra','AO'=>'Angola','AI'=>'Anguilla','AQ'=>'Antarctica','AG'=>'Antigua And Barbuda','AR'=>'Argentina','AM'=>'Armenia','AW'=>'Aruba','AU'=>'Australia','AT'=>'Austria','AZ'=>'Azerbaijan','BS'=>'Bahamas','BH'=>'Bahrain','BD'=>'Bangladesh','BB'=>'Barbados','BY'=>'Belarus','BE'=>'Belgium','BZ'=>'Belize','BJ'=>'Benin','BM'=>'Bermuda','BT'=>'Bhutan','BO'=>'Bolivia','BA'=>'Bosnia And Herzegovina','BW'=>'Botswana','BV'=>'Bouvet Island','BR'=>'Brazil','IO'=>'British Indian Ocean Territory','BN'=>'Brunei','BG'=>'Bulgaria','BF'=>'Burkina Faso','BI'=>'Burundi','KH'=>'Cambodia','CM'=>'Cameroon','CA'=>'Canada','CV'=>'Cape Verde','KY'=>'Cayman Islands','CF'=>'Central African Republic','TD'=>'Chad','CL'=>'Chile','CN'=>'China','CX'=>'Christmas Island','CC'=>'Cocos (Keeling) Islands','CO'=>'Columbia','KM'=>'Comoros','CG'=>'Congo','CK'=>'Cook Islands','CR'=>'Costa Rica','CI'=>'Cote DIvorie (Ivory Coast)','HR'=>'Croatia (Hrvatska)','CU'=>'Cuba','CY'=>'Cyprus','CZ'=>'Czech Republic','CD'=>'Democratic Republic Of Congo (Zaire)','DK'=>'Denmark','DJ'=>'Djibouti','DM'=>'Dominica','DO'=>'Dominican Republic','TP'=>'East Timor','EC'=>'Ecuador','EG'=>'Egypt','SV'=>'El Salvador','GQ'=>'Equatorial Guinea','ER'=>'Eritrea','EE'=>'Estonia','ET'=>'Ethiopia','FK'=>'Falkland Islands (Malvinas)','FO'=>'Faroe Islands','FJ'=>'Fiji','FI'=>'Finland','FR'=>'France','GF'=>'French Guinea','PF'=>'French Polynesia','TF'=>'French Southern Territories','GA'=>'Gabon','GM'=>'Gambia','GE'=>'Georgia','DE'=>'Germany','GH'=>'Ghana','GI'=>'Gibraltar','GR'=>'Greece','GL'=>'Greenland','GD'=>'Grenada','GP'=>'Guadeloupe','GU'=>'Guam','GT'=>'Guatemala','GN'=>'Guinea','GW'=>'Guinea-Bissau','GY'=>'Guyana','HT'=>'Haiti','HM'=>'Heard And McDonald Islands','HN'=>'Honduras','HK'=>'Hong Kong','HU'=>'Hungary','IS'=>'Iceland','IN'=>'India','ID'=>'Indonesia','IR'=>'Iran','IQ'=>'Iraq','IE'=>'Ireland','IL'=>'Israel','IT'=>'Italy','JM'=>'Jamaica','JP'=>'Japan','JO'=>'Jordan','KZ'=>'Kazakhstan','KE'=>'Kenya','KI'=>'Kiribati','KW'=>'Kuwait','KG'=>'Kyrgyzstan','LA'=>'Laos','LV'=>'Latvia','LB'=>'Lebanon','LS'=>'Lesotho','LR'=>'Liberia','LY'=>'Libya','LI'=>'Liechtenstein','LT'=>'Lithuania','LU'=>'Luxembourg','MO'=>'Macau','MK'=>'Macedonia','MG'=>'Madagascar','MW'=>'Malawi','MY'=>'Malaysia','MV'=>'Maldives','ML'=>'Mali','MT'=>'Malta','MH'=>'Marshall Islands','MQ'=>'Martinique','MR'=>'Mauritania','MU'=>'Mauritius','YT'=>'Mayotte','MX'=>'Mexico','FM'=>'Micronesia','MD'=>'Moldova','MC'=>'Monaco','MN'=>'Mongolia','MS'=>'Montserrat','MA'=>'Morocco','MZ'=>'Mozambique','MM'=>'Myanmar (Burma)','NA'=>'Namibia','NR'=>'Nauru','NP'=>'Nepal','NL'=>'Netherlands','AN'=>'Netherlands Antilles','NC'=>'New Caledonia','NZ'=>'New Zealand','NI'=>'Nicaragua','NE'=>'Niger','NG'=>'Nigeria','NU'=>'Niue','NF'=>'Norfolk Island','KP'=>'North Korea','MP'=>'Northern Mariana Islands','NO'=>'Norway','OM'=>'Oman','PK'=>'Pakistan','PW'=>'Palau','PA'=>'Panama','PG'=>'Papua New Guinea','PY'=>'Paraguay','PE'=>'Peru','PH'=>'Philippines','PN'=>'Pitcairn','PL'=>'Poland','PT'=>'Portugal','PR'=>'Puerto Rico','QA'=>'Qatar','RE'=>'Reunion','RO'=>'Romania','RU'=>'Russia','RW'=>'Rwanda','SH'=>'Saint Helena','KN'=>'Saint Kitts And Nevis','LC'=>'Saint Lucia','PM'=>'Saint Pierre And Miquelon','VC'=>'Saint Vincent And The Grenadines','SM'=>'San Marino','ST'=>'Sao Tome And Principe','SA'=>'Saudi Arabia','SN'=>'Senegal','SC'=>'Seychelles','SL'=>'Sierra Leone','SG'=>'Singapore','SK'=>'Slovak Republic','SI'=>'Slovenia','SB'=>'Solomon Islands','SO'=>'Somalia','ZA'=>'South Africa','GS'=>'South Georgia And South Sandwich Islands','KR'=>'South Korea','ES'=>'Spain','LK'=>'Sri Lanka','SD'=>'Sudan','SR'=>'Suriname','SJ'=>'Svalbard And Jan Mayen','SZ'=>'Swaziland','SE'=>'Sweden','CH'=>'Switzerland','SY'=>'Syria','TW'=>'Taiwan','TJ'=>'Tajikistan','TZ'=>'Tanzania','TH'=>'Thailand','TG'=>'Togo','TK'=>'Tokelau','TO'=>'Tonga','TT'=>'Trinidad And Tobago','TN'=>'Tunisia','TR'=>'Turkey','TM'=>'Turkmenistan','TC'=>'Turks And Caicos Islands','TV'=>'Tuvalu','UG'=>'Uganda','UA'=>'Ukraine','AE'=>'United Arab Emirates','GB'=>'United Kingdom','US'=>'United States','UM'=>'United States Minor Outlying Islands','UY'=>'Uruguay','UZ'=>'Uzbekistan','VU'=>'Vanuatu','VA'=>'Vatican City (Holy See)','VE'=>'Venezuela','VN'=>'Vietnam','VG'=>'Virgin Islands (British)','VI'=>'Virgin Islands (US)','WF'=>'Wallis And Futuna Islands','EH'=>'Western Sahara','WS'=>'Western Samoa','YE'=>'Yemen','YU'=>'Yugoslavia','ZM'=>'Zambia','ZW'=>'Zimbabwe');
        $this->set('countryarr', json_encode($countries));
		
		$identityid=0;
		if(isset($employee['identity']['id'])){
			$identityid=$employee['identity']['id'];
		}

		$ids = $this->Employees->Identities->find('all')->where("Identities.employee_id=".$id)->andwhere("Identities.id!=".$identityid)
							->andwhere("Identities.customer_id=".$this->loggedinuser['customer_id']);
		$this->set('ids', json_encode($ids));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);

        if($employee['customer_id'] == $this->loggedinuser['customer_id']) 
		{
			$employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['visible'] = "0" ;
            if ($this->Employees->save($employee)) {
            	$this->Flash->success(__('The employee has been deleted.'));
        	} else {
            	$this->Flash->error(__('The employee could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Employees->get($value);
					// $record = $this->Employees->patchEntity($record, $this->request->data);
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	   $record['visible'] = "0" ;
						   if ($this->Employees->save($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Employees has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Employees could not be deleted. Please, try again.'));
				}
		
		   }
             return $this->redirect(['action' => 'index']);	
     }
}
