<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
		$contains=['Empdatabiographies'=> ['Positions'], 'Empdatapersonals', 'Employmentinfos', 'ContactInfos','Jobinfos'];

		$usrfilter="Employees.customer_id ='".$this->loggedinuser['customer_id'] . "' and Employees.visible='1'";
		$output =$this->Datatable->getView($fields,$contains,$usrfilter);
		echo json_encode($output);
    }
    public function index()
    {
		$this->loadModel('CreateConfigs');
        $configs=$this->CreateConfigs->find('all')->where(['table_name' => $this->request->params['controller']])->order(['"id"' => 'ASC'])->toArray();
        $this->set('configs',$configs);

		$this->paginate = [
            'contain' => ['Empdatabiographies'=> ['Positions'], 'Empdatapersonals', 'Employmentinfos','Customers', 'ContactInfos', 'Jobinfos']
        ];

        $employees = $this->Employees->find('all',['contain' => ['Empdatabiographies'=> ['Positions'],'Empdatapersonals','ContactInfos', 'Addresses'=> function($q) {
        					 return $q->where(['Addresses.address_type' => '1']); }]])->where(['Employees.visible' => 1])
        					->andwhere(['Employees.customer_id' => $this->loggedinuser['customer_id'] ]);

		$actions =[ ['name'=>'delete','title'=>'Delete','class'=>' label-danger'] ];
        $this->set('actions',$actions);
		$positions = $this->Employees->JobInfos->Positions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;

        $this->set(compact('employees','positions'));
        $this->set('_serialize', ['employees']);
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
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos','EducationalQualifications','Experiences', 'Addresses' => function ($q) {
       							return $q->where(['Addresses.address_type' => '1']); },'Identities','Jobinfos','Skills','OfficeAssets']
        ]);
		if($employee['customer_id']==$this->loggedinuser['customer_id'] && $employee['visible']=='1'){
        	$payGroups = $this->Employees->JobInfos->PayGroups->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$businessUnits = $this->Employees->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
     		$divisions = $this->Employees->JobInfos->Divisions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
   		    $costCentres = $this->Employees->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
  	  	    $payGrades = $this->Employees->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$locations = $this->Employees->JobInfos->Locations->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$departments = $this->Employees->JobInfos->Departments->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        	$legalEntities = $this->Employees->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
       	 	$holidayCalendars = $this->Employees->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
			$workSchedules = $this->Employees->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
			$timeTypeProfiles = $this->Employees->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;

        	$this->set(compact('payGroups','positions', 'employee', 'customers', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));

        	$this->set('_serialize', ['employee']);



			$identityid=0;
			if(isset($employee['identity']['id'])){
				$identityid=$employee['identity']['id'];
			}
			$idcontents = $this->Employees->Identities->find('all')->where("Identities.employee_id=".$id)->andwhere("Identities.id!=".$identityid)
							->andwhere("Identities.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('ids', json_encode($idcontents));

			$experienceid=0;
			if(isset($employee['experience']['id'])){
				$experienceid=$employee['experience']['id'];
			}
			$experiences = $this->Employees->Experiences->find('all')->where("Experiences.employee_id=".$id)->andwhere("Experiences.id!=".$experienceid)
							->andwhere("Experiences.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('experiences', json_encode($experiences));

			$qualificationid=0;
			if(isset($employee['educational_qualification']['id'])){
				$qualificationid=$employee['educational_qualification']['id'];
			}
			$qualifications = $this->Employees->EducationalQualifications->find('all')->where("EducationalQualifications.employee_id=".$id)->andwhere("EducationalQualifications.id!=".$qualificationid)
							->andwhere("EducationalQualifications.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('qualifications', json_encode($qualifications));

			$skillid=0;
			if(isset($employee['skill']['id'])){
				$skillid=$employee['skill']['id'];
			}
			$skills = $this->Employees->Skills->find('all')->where("Skills.employee_id=".$id)->andwhere("Skills.id!=".$skillid)
							->andwhere("Skills.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('skills', json_encode($skills));

			$assetid=0;
			if(isset($employee['office_asset']['id'])){
				$assetid=$employee['office_asset']['id'];
			}
			$assets = $this->Employees->OfficeAssets->find('all')->where("OfficeAssets.employee_id=".$id)->andwhere("OfficeAssets.id!=".$assetid)
							->andwhere("OfficeAssets.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('assets', json_encode($assets));


			$this->loadModel('Addresses');
        	$address = $this->Addresses->find('all')->where("Addresses.employee_id=".$id)->andwhere("Addresses.address_type='2'")
							->andwhere("Addresses.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('addresses',  json_encode($address));

		}else{
		    $this->Flash->error(__('You are not Authorized.'));
			return $this->redirect(['action' => 'index']);
       }
		$countries = array('Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','American Samoa'=>'American Samoa','Andorra'=>'Andorra','Angola'=>'Angola','Anguilla'=>'Anguilla','Antarctica'=>'Antarctica','Antigua And Barbuda'=>'Antigua And Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Aruba'=>'Aruba','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bermuda'=>'Bermuda','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia And Herzegovina'=>'Bosnia And Herzegovina','Botswana'=>'Botswana','Bouvet Island'=>'Bouvet Island','Brazil'=>'Brazil','British Indian Ocean Territory'=>'British Indian Ocean Territory','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Cayman Islands'=>'Cayman Islands','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Christmas Island'=>'Christmas Island','Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands','Columbia'=>'Columbia','Comoros'=>'Comoros','Congo'=>'Congo','Cook Islands'=>'Cook Islands','Costa Rica'=>'Costa Rica','Cote D\'Ivorie (Ivory Coast)'=>'Cote D\'Ivorie (Ivory Coast)','Croatia (Hrvatska)'=>'Croatia (Hrvatska)','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Democratic Republic Of Congo (Zaire)'=>'Democratic Republic Of Congo (Zaire)','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor'=>'East Timor','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Falkland Islands (Malvinas)'=>'Falkland Islands (Malvinas)','Faroe Islands'=>'Faroe Islands','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','French Guinea'=>'French Guinea','French Polynesia'=>'French Polynesia','French Southern Territories'=>'French Southern Territories','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Gibraltar'=>'Gibraltar','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guadeloupe'=>'Guadeloupe','Guam'=>'Guam','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Heard And McDonald Islands'=>'Heard And McDonald Islands','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macau'=>'Macau','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Martinique'=>'Martinique','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mayotte'=>'Mayotte','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Montserrat'=>'Montserrat','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar (Burma)'=>'Myanmar (Burma)','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','Netherlands Antilles'=>'Netherlands Antilles','New Caledonia'=>'New Caledonia','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Niue'=>'Niue','Norfolk Island'=>'Norfolk Island','North Korea'=>'North Korea','Northern Mariana Islands'=>'Northern Mariana Islands','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Pitcairn'=>'Pitcairn','Poland'=>'Poland','Portugal'=>'Portugal','Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Reunion'=>'Reunion','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Saint Helena'=>'Saint Helena','Saint Kitts And Nevis'=>'Saint Kitts And Nevis','Saint Lucia'=>'Saint Lucia','Saint Pierre And Miquelon'=>'Saint Pierre And Miquelon','Saint Vincent And The Grenadines'=>'Saint Vincent And The Grenadines','San Marino'=>'San Marino','Sao Tome And Principe'=>'Sao Tome And Principe','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovak Republic'=>'Slovak Republic','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','South Georgia And South Sandwich Islands'=>'South Georgia And South Sandwich Islands','South Korea'=>'South Korea','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Svalbard And Jan Mayen'=>'Svalbard And Jan Mayen','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tokelau'=>'Tokelau','Tonga'=>'Tonga','Trinidad And Tobago'=>'Trinidad And Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Turks And Caicos Islands'=>'Turks And Caicos Islands','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','United States Minor Outlying Islands'=>'United States Minor Outlying Islands','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Vatican City (Holy See)'=>'Vatican City (Holy See)','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Virgin Islands (British)'=>'Virgin Islands (British)','Virgin Islands (US)'=>'Virgin Islands (US)','Wallis And Futuna Islands'=>'Wallis And Futuna Islands','Western Sahara'=>'Western Sahara','Western Samoa'=>'Western Samoa','Yemen'=>'Yemen','Yugoslavia'=>'Yugoslavia','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe');
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
            $employee = $this->Employees->patchEntity($employee, $this->request->data,['associated' => [ 'Skills','OfficeAssets',
            					'EducationalQualifications','Experiences', 'Empdatabiographies', 'Empdatapersonals', 'Employmentinfos','Jobinfos', 'Customers', 'ContactInfos', 'Addresses','Identities']]);
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
			$employee['educationalqualification']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['experience']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['address']['address_type']="1";

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
        $payGroups = $this->Employees->JobInfos->PayGroups->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->Employees->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->Employees->JobInfos->Divisions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->Employees->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->Employees->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->Employees->JobInfos->Locations->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Employees->JobInfos->Departments->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $legalEntities = $this->Employees->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidayCalendars = $this->Employees->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$workSchedules = $this->Employees->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$timeTypeProfiles = $this->Employees->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;

        $this->set(compact('payGroups','positions', 'employee', 'customers', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));
        $this->set('_serialize', ['employee']);

		$countries = array('Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','American Samoa'=>'American Samoa','Andorra'=>'Andorra','Angola'=>'Angola','Anguilla'=>'Anguilla','Antarctica'=>'Antarctica','Antigua And Barbuda'=>'Antigua And Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Aruba'=>'Aruba','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bermuda'=>'Bermuda','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia And Herzegovina'=>'Bosnia And Herzegovina','Botswana'=>'Botswana','Bouvet Island'=>'Bouvet Island','Brazil'=>'Brazil','British Indian Ocean Territory'=>'British Indian Ocean Territory','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Cayman Islands'=>'Cayman Islands','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Christmas Island'=>'Christmas Island','Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands','Columbia'=>'Columbia','Comoros'=>'Comoros','Congo'=>'Congo','Cook Islands'=>'Cook Islands','Costa Rica'=>'Costa Rica','Cote D\'Ivorie (Ivory Coast)'=>'Cote D\'Ivorie (Ivory Coast)','Croatia (Hrvatska)'=>'Croatia (Hrvatska)','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Democratic Republic Of Congo (Zaire)'=>'Democratic Republic Of Congo (Zaire)','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor'=>'East Timor','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Falkland Islands (Malvinas)'=>'Falkland Islands (Malvinas)','Faroe Islands'=>'Faroe Islands','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','French Guinea'=>'French Guinea','French Polynesia'=>'French Polynesia','French Southern Territories'=>'French Southern Territories','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Gibraltar'=>'Gibraltar','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guadeloupe'=>'Guadeloupe','Guam'=>'Guam','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Heard And McDonald Islands'=>'Heard And McDonald Islands','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macau'=>'Macau','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Martinique'=>'Martinique','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mayotte'=>'Mayotte','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Montserrat'=>'Montserrat','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar (Burma)'=>'Myanmar (Burma)','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','Netherlands Antilles'=>'Netherlands Antilles','New Caledonia'=>'New Caledonia','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Niue'=>'Niue','Norfolk Island'=>'Norfolk Island','North Korea'=>'North Korea','Northern Mariana Islands'=>'Northern Mariana Islands','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Pitcairn'=>'Pitcairn','Poland'=>'Poland','Portugal'=>'Portugal','Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Reunion'=>'Reunion','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Saint Helena'=>'Saint Helena','Saint Kitts And Nevis'=>'Saint Kitts And Nevis','Saint Lucia'=>'Saint Lucia','Saint Pierre And Miquelon'=>'Saint Pierre And Miquelon','Saint Vincent And The Grenadines'=>'Saint Vincent And The Grenadines','San Marino'=>'San Marino','Sao Tome And Principe'=>'Sao Tome And Principe','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovak Republic'=>'Slovak Republic','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','South Georgia And South Sandwich Islands'=>'South Georgia And South Sandwich Islands','South Korea'=>'South Korea','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Svalbard And Jan Mayen'=>'Svalbard And Jan Mayen','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tokelau'=>'Tokelau','Tonga'=>'Tonga','Trinidad And Tobago'=>'Trinidad And Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Turks And Caicos Islands'=>'Turks And Caicos Islands','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','United States Minor Outlying Islands'=>'United States Minor Outlying Islands','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Vatican City (Holy See)'=>'Vatican City (Holy See)','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Virgin Islands (British)'=>'Virgin Islands (British)','Virgin Islands (US)'=>'Virgin Islands (US)','Wallis And Futuna Islands'=>'Wallis And Futuna Islands','Western Sahara'=>'Western Sahara','Western Samoa'=>'Western Samoa','Yemen'=>'Yemen','Yugoslavia'=>'Yugoslavia','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe');
        $this->set('countryarr', json_encode($countries));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function deleteIds()
	{
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$this->loadModel('Identities');

			$identity = $this->Identities->get($this->request->data['identityid']);

        	if($identity['customer_id'] == $this->loggedinuser['customer_id']  && $identity['employee_id'] == $this->request->data['empid'])
			{
				$identity = $this->Identities->patchEntity($identity, $this->request->data);
            	if ($this->Identities->delete($identity)) {
            		$this->response->body("success");
	    			return $this->response;
        		} else {
            		$this->response->body("error");
	    			return $this->response;
        		}
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}
	}
	public function deleteQualifications()
	{
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$this->loadModel('EducationalQualifications');

			$qualification = $this->EducationalQualifications->get($this->request->data['qualificationid']);

        	if($qualification['customer_id'] == $this->loggedinuser['customer_id']  && $qualification['employee_id'] == $this->request->data['empid'])
			{
				$qualification = $this->EducationalQualifications->patchEntity($qualification, $this->request->data);
            	if ($this->EducationalQualifications->delete($qualification)) {
            		$this->response->body("success");
	    			return $this->response;
        		} else {
            		$this->response->body("error");
	    			return $this->response;
        		}
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}
	}
	public function deleteExperiences()
	{
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$this->loadModel('Experiences');

			$experience = $this->Experiences->get($this->request->data['experienceid']);

        	if($experience['customer_id'] == $this->loggedinuser['customer_id']  && $experience['employee_id'] == $this->request->data['empid'])
			{
				$experience = $this->Experiences->patchEntity($experience, $this->request->data);
            	if ($this->Experiences->delete($experience)) {
            		$this->response->body("success");
	    			return $this->response;
        		} else {
            		$this->response->body("error");
	    			return $this->response;
        		}
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}
	}
	public function deleteAssets()
	{
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$this->loadModel('OfficeAssets');

			$asset = $this->OfficeAssets->get($this->request->data['assetid']);

        	if($asset['customer_id'] == $this->loggedinuser['customer_id']  && $asset['employee_id'] == $this->request->data['empid'])
			{
				$asset = $this->OfficeAssets->patchEntity($asset, $this->request->data);
            	if ($this->OfficeAssets->delete($asset)) {
            		$this->response->body("success");
	    			return $this->response;
        		} else {
            		$this->response->body("error");
	    			return $this->response;
        		}
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}
	}
	public function deleteSkills()
	{
		if($this->request->is('ajax')) {

			$this->autoRender=false;
			$this->loadModel('Skills');

			$skill = $this->Skills->get($this->request->data['skillid']);

        	if($skill['customer_id'] == $this->loggedinuser['customer_id']  && $skill['employee_id'] == $this->request->data['empid'])
			{
				$skill = $this->Skills->patchEntity($skill, $this->request->data);
            	if ($this->Skills->delete($skill)) {
            		$this->response->body("success");
	    			return $this->response;
        		} else {
            		$this->response->body("error");
	    			return $this->response;
        		}
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}
	}
	public function addEmployee(){

    	if($this->request->is('ajax')) {

			$this->autoRender=false;

			$employee = $this->Employees->newEntity();
        	$employee = $this->Employees->patchEntity($employee, $this->request->data,['associated' => ['EducationalQualifications','Experiences','Empdatabiographies', 'Empdatapersonals',
        						 'Employmentinfos','Jobinfos', 'Customers', 'ContactInfos', 'Addresses','Identities', 'Skills','OfficeAssets']]);
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
			$employee['address']['address_type']="1";

			$employee['educational_qualification']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['experience']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['office_asset']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['skill']['customer_id']=$this->loggedinuser['customer_id'];

			$employee['empdatabiography']['position_id']=$employee['jobinfo']['position_id'];

            if ($this->Employees->save($employee)) {

                // $this->Flash->success(__('The employee has been saved.'));
                $this->response->body($employee['id']);
	    		return $this->response;
            } else {
                $this->response->body("error");
	    		return $this->response;
            }
		}
	}
	public function addAddress(){

    	if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('Addresses');

			$arr = $this->Addresses->find('all',['conditions' => array('employee_id' => $this->request->data['empid'],'address_type'=>'2'),
            	'contain' => []
        	])->toArray();

			isset($arr[0]) ? $address = $arr[0] : $address = $this->Addresses->newEntity();

			$address=$this->Addresses->patchEntity($address,$this->request->data);
			$address['address_type']="2";
			$address['customer_id']=$this->loggedinuser['customer_id'];

            $address['address1']=$this->request->data['address1'];
			$address['address2']=$this->request->data['address2'];
           	$address['address3']=$this->request->data['address3'];
			$address['address4']=$this->request->data['address4'];
			$address['address5']=$this->request->data['address5'];
			$address['address6']=$this->request->data['address6'];
			$address['address7']=$this->request->data['address7'];
			$address['address8']=$this->request->data['address8'];
			$address['city']=$this->request->data['city'];
			$address['county']=$this->request->data['county'];
			$address['state']=$this->request->data['state'];
			$address['zip_code']=$this->request->data['zipcode'];
			$address['employee_id']=$this->request->data['empid'];

			if ($this->Addresses->save($address)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {
                	$this->response->body("error");
	    			return $this->response;
            }
		}
    }
    public function addIds(){

    	if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('Identities');

			if($this->request->data['identityid']!="" && $this->request->data['identityid']!="0"){
				$identity = $this->Identities->get($this->request->data['identityid'], []);
			}else{
				$identity = $this->Identities->newEntity();
			}

			$identity=$this->Identities->patchEntity($identity,$this->request->data);
            $identity['customer_id']=$this->loggedinuser['customer_id'];
			$identity['employee_id']=$this->request->data['empid'];
           	$identity['card_type']=$this->request->data['idtype'];
			$identity['country']=$this->request->data['country'];
            $identity['nationalid']=$this->request->data['nationalid'];
			$identity['is_primary']=$this->request->data['isprimary'];
			$identity['issuedate']=$this->request->data['issuedate'];
			$identity['expirydate']=$this->request->data['expirydate'];

			// $userdf = $this->request->session()->read('sessionuser')['dateformat'];
            // if(isset($userdf)  & $userdf===1){
				// foreach (["issuedate", "expirydate"] as $value) {
					// if(isset($identity[$value])){
						// if($identity[$value]!=null && $identity[$value]!='' && strpos($identity[$value], '/') !== false){
							// $identity[$value] = str_replace('/', '-', $identity[$value]);
							// $identity[$value]=date('Y/m/d', strtotime($identity[$value]));
						// }
					// }
				// }
			// }

			if ($this->Identities->save($identity)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {
                	$this->response->body("error");
	    			return $this->response;
            }
		}
    }
	public function addOfficeAssets(){

    	if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('OfficeAssets');

			if($this->request->data['assetid']!="" && $this->request->data['assetid']!="0"){
				$asset = $this->OfficeAssets->get($this->request->data['assetid'], []);
			}else{
				$asset = $this->OfficeAssets->newEntity();
			}

			$asset=$this->OfficeAssets->patchEntity($asset,$this->request->data);
            $asset['customer_id']=$this->loggedinuser['customer_id'];
			$asset['employee_id']=$this->request->data['empid'];
           	$asset['location']=$this->request->data['assetlocation'];
			$asset['assettype']=$this->request->data['assettype'];
			$asset['assetnumber']=$this->request->data['assetnumber'];
			$asset['assetdescription']=$this->request->data['assetdescription'];
			$asset['issuedate']=$this->request->data['assetissuedate'];
			$asset['todate']=$this->request->data['assettodate'];

			// $userdf = $this->request->session()->read('sessionuser')['dateformat'];
            // if(isset($userdf)  & $userdf===1){
				// foreach (["issuedate", "todate"] as $value) {
					// if(isset($asset[$value])){
						// if($asset[$value]!=null && $asset[$value]!='' && strpos($asset[$value], '/') !== false){
							// $asset[$value] = str_replace('/', '-', $asset[$value]);
							// $asset[$value]=date('Y/m/d', strtotime($asset[$value]));
						// }
					// }
				// }
			// }

			if ($this->OfficeAssets->save($asset)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {
                	$this->response->body("error");
	    			return $this->response;
            }
		}
    }
	public function addSkills(){

    	if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('Skills');

			if($this->request->data['skillid']!="" && $this->request->data['skillid']!="0"){
				$skill = $this->Skills->get($this->request->data['skillid'], []);
			}else{
				$skill = $this->Skills->newEntity();
			}

			$skill=$this->Skills->patchEntity($skill,$this->request->data);
            $skill['customer_id']=$this->loggedinuser['customer_id'];
			$skill['employee_id']=$this->request->data['empid'];
           	$skill['skill']=$this->request->data['skill'];
			$skill['skillgroup']=$this->request->data['skillgroup'];
			$skill['proficiency']=$this->request->data['skillproficiency'];
			$skill['fromdate']=$this->request->data['skillfromdate'];
			$skill['todate']=$this->request->data['skilltodate'];

			// $userdf = $this->request->session()->read('sessionuser')['dateformat'];
            // if(isset($userdf)  & $userdf===1){
				// foreach (["fromdate", "todate"] as $value) {
					// if(isset($skill[$value])){
						// if($skill[$value]!=null && $skill[$value]!='' && strpos($skill[$value], '/') !== false){
							// $skill[$value] = str_replace('/', '-', $skill[$value]);
							// $skill[$value]=date('Y/m/d', strtotime($skill[$value]));
						// }
					// }
				// }
			// }

			if ($this->Skills->save($skill)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {
                	$this->response->body("error");
	    			return $this->response;
            }
		}
    }
	public function getEmployeenamefromEmpDataBiographyId(){

		if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('EmpDataBiographies');
			$empdatabiographyarr=$this->EmpDataBiographies->find('all',['conditions' => array('id' => $this->request->data['empdatabiographyid'])])->toArray();
			isset($empdatabiographyarr[0]) ? $empid = $empdatabiographyarr[0]['employee_id'] : $empid = "" ;

			if($empdatabiographyarr!="" && $empdatabiographyarr!=null && isset($empdatabiographyarr[0]['employee_id']) ){
				$this->loadModel('EmpDataPersonals');
				$empDataPersonals = $this->EmpDataPersonals->find('all')->where(['employee_id' => $empdatabiographyarr[0]['employee_id']])
												->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0'])->toArray();

				if(isset($empDataPersonals[0])){
					$this->response->body($empDataPersonals[0]['first_name']." ".$empDataPersonals[0]['last_name']." (".$empDataPersonals[0]['employee_id'].")");
					return $this->response;
				}
			}
			$this->response->body($this->request->data['empdatabiographyid']);
	    	return $this->response;
		}
	}
	public function addExperiences(){

    	if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('Experiences');

			if($this->request->data['experienceid']!="" && $this->request->data['experienceid']!="0"){
				$experience = $this->Experiences->get($this->request->data['experienceid'], []);
			}else{
				$experience = $this->Experiences->newEntity();
			}

			$experience=$this->Experiences->patchEntity($experience,$this->request->data);
            $experience['customer_id']=$this->loggedinuser['customer_id'];
			$experience['employee_id']=$this->request->data['empid'];
           	$experience['designation']=$this->request->data['designation'];
			$experience['industry']=$this->request->data['industry'];
			$experience['function']=$this->request->data['efunction'];
			$experience['employer']=$this->request->data['employer'];
			$experience['city']=$this->request->data['city'];
			$experience['country']=$this->request->data['country'];
            $experience['fromdate']=$this->request->data['fromdate'];
			$experience['todate']=$this->request->data['todate'];
			$experience['contract']=$this->request->data['contract'];

			// $userdf = $this->request->session()->read('sessionuser')['dateformat'];
            // if(isset($userdf)  & $userdf===1){
				// foreach (["fromdate", "todate"] as $value) {
					// if(isset($experience[$value])){
						// if($experience[$value]!=null && $experience[$value]!='' && strpos($experience[$value], '/') !== false){
							// $experience[$value] = str_replace('/', '-', $experience[$value]);
							// $experience[$value]=date('Y/m/d', strtotime($experience[$value]));
						// }
					// }
				// }
			// }

			if ($this->Experiences->save($experience)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {
                	$this->response->body("error");
	    			return $this->response;
            }
		}
    }
	public function addQualifications(){

    	if($this->request->is('ajax')) {

			$this->autoRender=false;

			$this->loadModel('EducationalQualifications');

			if($this->request->data['qualificationid']!="" && $this->request->data['qualificationid']!="0"){
				$educationalQualification = $this->EducationalQualifications->get($this->request->data['qualificationid'], []);
			}else{
				$educationalQualification = $this->EducationalQualifications->newEntity();
			}

			$educationalQualification=$this->EducationalQualifications->patchEntity($educationalQualification,$this->request->data);
            $educationalQualification['customer_id']=$this->loggedinuser['customer_id'];
			$educationalQualification['employee_id']=$this->request->data['empid'];
           	$educationalQualification['qualification']=$this->request->data['qualification'];
			$educationalQualification['subject']=$this->request->data['subject'];
			$educationalQualification['subject2']=$this->request->data['secsubject'];
            $educationalQualification['schoolcollege']=$this->request->data['schoolcollege'];
            $educationalQualification['city']=$this->request->data['city'];
			$educationalQualification['fromdate']=$this->request->data['fromdate'];
			$educationalQualification['passdate']=$this->request->data['passdate'];
			$educationalQualification['grade']=$this->request->data['grade'];

			// $userdf = $this->request->session()->read('sessionuser')['dateformat'];
            // if(isset($userdf)  & $userdf===1){
				// foreach (["fromdate", "passdate"] as $value) {
					// if(isset($educationalQualification[$value])){
						// if($educationalQualification[$value]!=null && $educationalQualification[$value]!='' && strpos($educationalQualification[$value], '/') !== false){
							// $educationalQualification[$value] = str_replace('/', '-', $educationalQualification[$value]);
							// $educationalQualification[$value]=date('Y/m/d', strtotime($educationalQualification[$value]));
						// }
					// }
				// }
			// }

			if ($this->EducationalQualifications->save($educationalQualification)) {

               	 	$this->response->body("success");
	    			return $this->response;
            } else {
                	$this->response->body("error");
	    			return $this->response;
            }
		}
    }
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Empdatabiographies', 'Empdatapersonals', 'Employmentinfos', 'ContactInfos','EducationalQualifications','Experiences', 'Addresses' => function ($q) {
       							return $q->where(['Addresses.address_type' => '1']); },'Identities','Jobinfos','Skills','OfficeAssets']
        ]);

		if($employee['customer_id'] != $this->loggedinuser['customer_id'] || $employee['visible'] != '1')
		{
			 $this->Flash->error(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
        	
			$conn = ConnectionManager::get('default');
			$conn->begin();

            $employee = $this->Employees->patchEntity($employee, $this->request->data);
			$employee['customer_id']=$this->loggedinuser['customer_id'];
			$employee['address']['customer_id']=$this->loggedinuser['customer_id'];
			$employee['address']['address_type']="1";

            if ($this->Employees->save($employee)) {

				//associated Empdatapersonals
            		$this->loadModel('EmpDataPersonals');
					$arr = $this->EmpDataPersonals->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataPersonal = $arr[0] : $empDataPersonal = $this->EmpDataPersonals->newEntity();
					// $empDataPersonal = $arr[0];
					$empDataPersonal = $this->EmpDataPersonals->patchEntity($empDataPersonal, $this->request->data['empdatapersonal']);
            		if ($this->Employees->EmpDataPersonals->save($empDataPersonal)) {

                	}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }

					//associated EmpDataBiographies
            		$this->loadModel('EmploymentInfos');
					$arr = $this->EmploymentInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $employmentinfo = $arr[0] : $employmentinfo = $this->EmploymentInfos->newEntity();
					// $employmentinfo = $arr[0];
					$employmentinfo = $this->EmploymentInfos->patchEntity($employmentinfo, $this->request->data['employmentinfo']);
            		if ($this->Employees->EmploymentInfos->save($employmentinfo)) {

               		}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }

					//associated Contact Infos
            		$this->loadModel('ContactInfos');
					$arr = $this->ContactInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $contactinfo = $arr[0] : $contactinfo = $this->ContactInfos->newEntity();
					// $contactinfo = $arr[0];
					$contactinfo = $this->ContactInfos->patchEntity($contactinfo, $this->request->data['contact_info']);
					$contactinfo['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->ContactInfos->save($contactinfo)) {

            		}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }
					//associated JobInfos
            		$this->loadModel('JobInfos');
					$arr = $this->JobInfos->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $jobinfo = $arr[0] : $jobinfo = $this->JobInfos->newEntity();
					// $jobinfo = $arr[0];
					$jobinfo = $this->JobInfos->patchEntity($jobinfo, $this->request->data['jobinfo']);
					$jobinfo['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->JobInfos->save($jobinfo)) {

            		}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }

					//associated EmpDataBiographies
            		$this->loadModel('EmpDataBiographies');
					$arr = $this->EmpDataBiographies->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $empDataBiography = $arr[0] : $empDataBiography = $this->EmpDataBiographies->newEntity();
					$empDataBiography = $this->EmpDataBiographies->patchEntity($empDataBiography, $this->request->data['empdatabiography']);
					$empDataBiography['position_id']=$jobinfo['position_id'];
            		if ($this->Employees->EmpDataBiographies->save($empDataBiography)) {

					}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }

					//associated Addresses
            		$this->loadModel('Addresses');
					$arr = $this->Addresses->find('all',['conditions' => array('employee_id' => $id,'address_type' => '1'), 'contain' => []])->toArray();
					isset($arr[0]) ? $address = $arr[0] : $address = $this->Addresses->newEntity();
					$address = $this->Addresses->patchEntity($address, $this->request->data['address']);
					$address['customer_id']=$this->loggedinuser['customer_id'];
					$address['address_type']="1";
    				if ($this->Employees->Addresses->save($address)) {

            		}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }
					//associated Identities
            		$this->loadModel('Identities');
					$arr = $this->Identities->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $identity = $arr[0] : $identity = $this->Identities->newEntity();
					// $identity = $arr[0];
					$identity = $this->Identities->patchEntity($identity, $this->request->data['identity']);
					$identity['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->Identities->save($identity)) {

            		}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }

					//associated Experiences
            		$this->loadModel('Experiences');
					$arr = $this->Experiences->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $experience = $arr[0] : $experience = $this->Experiences->newEntity();
					$experience = $this->Experiences->patchEntity($experience, $this->request->data['experience']);
					$experience['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->Experiences->save($experience)) {

            		}else{$this->Flash->error(__('The employee could not be saved. Please, try again.')); $conn->rollback(); }

					//associated EducationalQualifications
            		$this->loadModel('EducationalQualifications');
					$arr = $this->EducationalQualifications->find('all',['conditions' => array('employee_id' => $id), 'contain' => []])->toArray();
					isset($arr[0]) ? $qualification = $arr[0] : $qualification = $this->EducationalQualifications->newEntity();
					$qualification = $this->EducationalQualifications->patchEntity($qualification, $this->request->data['educational_qualification']);
					$qualification['customer_id']=$this->loggedinuser['customer_id'];
    				if ($this->Employees->EducationalQualifications->save($qualification)) {
						$conn->commit();
            		}
				
				$this->Flash->success(__('The employee has been saved.'));
				
				$userrole=$this->request->session()->read('sessionuser')['role'];
				if ($userrole=="root" || $userrole=="admin"){
					return $this->redirect(['action' => 'index']);
				}else{
					return $this->redirect(['action' => 'index','controller'=>'Homes']);
				}
				
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }

		$this->set('id', $id);

		$positions="";
		$rslt=$this->Employees->getIncludedPositions($id);
		foreach($rslt as $key =>$value){
			$positions[$value['id']]=$value['name'];
		}
		// $this->log($positions);


		// $positions = $this->Employees->JobInfos->Positions->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGroups = $this->Employees->JobInfos->PayGroups->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $businessUnits = $this->Employees->JobInfos->BusinessUnits->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $divisions = $this->Employees->JobInfos->Divisions->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $costCentres = $this->Employees->JobInfos->CostCentres->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $payGrades = $this->Employees->JobInfos->PayGrades->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $locations = $this->Employees->JobInfos->Locations->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Employees->JobInfos->Departments->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $legalEntities = $this->Employees->JobInfos->LegalEntities->find('list', ['limit' => 200])->where(['effective_status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $holidayCalendars = $this->Employees->JobInfos->HolidayCalendars->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$workSchedules = $this->Employees->JobInfos->WorkSchedules->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$timeTypeProfiles = $this->Employees->JobInfos->TimeTypeProfiles->find('list', ['limit' => 200])->where(['status' => '0'])->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;

        $this->set(compact('payGroups','positions', 'employee', 'customers', 'businessUnits', 'divisions', 'costCentres', 'payGrades', 'locations', 'departments', 'legalEntities','timeTypeProfiles','workSchedules','holidayCalendars'));
        $this->set('_serialize', ['employee']);

		$countries = array('Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','American Samoa'=>'American Samoa','Andorra'=>'Andorra','Angola'=>'Angola','Anguilla'=>'Anguilla','Antarctica'=>'Antarctica','Antigua And Barbuda'=>'Antigua And Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Aruba'=>'Aruba','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bermuda'=>'Bermuda','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia And Herzegovina'=>'Bosnia And Herzegovina','Botswana'=>'Botswana','Bouvet Island'=>'Bouvet Island','Brazil'=>'Brazil','British Indian Ocean Territory'=>'British Indian Ocean Territory','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Cayman Islands'=>'Cayman Islands','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Christmas Island'=>'Christmas Island','Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands','Columbia'=>'Columbia','Comoros'=>'Comoros','Congo'=>'Congo','Cook Islands'=>'Cook Islands','Costa Rica'=>'Costa Rica','Cote D\'Ivorie (Ivory Coast)'=>'Cote D\'Ivorie (Ivory Coast)','Croatia (Hrvatska)'=>'Croatia (Hrvatska)','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Democratic Republic Of Congo (Zaire)'=>'Democratic Republic Of Congo (Zaire)','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor'=>'East Timor','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Falkland Islands (Malvinas)'=>'Falkland Islands (Malvinas)','Faroe Islands'=>'Faroe Islands','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','French Guinea'=>'French Guinea','French Polynesia'=>'French Polynesia','French Southern Territories'=>'French Southern Territories','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Gibraltar'=>'Gibraltar','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guadeloupe'=>'Guadeloupe','Guam'=>'Guam','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Heard And McDonald Islands'=>'Heard And McDonald Islands','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macau'=>'Macau','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Martinique'=>'Martinique','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mayotte'=>'Mayotte','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Montserrat'=>'Montserrat','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar (Burma)'=>'Myanmar (Burma)','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','Netherlands Antilles'=>'Netherlands Antilles','New Caledonia'=>'New Caledonia','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Niue'=>'Niue','Norfolk Island'=>'Norfolk Island','North Korea'=>'North Korea','Northern Mariana Islands'=>'Northern Mariana Islands','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Pitcairn'=>'Pitcairn','Poland'=>'Poland','Portugal'=>'Portugal','Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Reunion'=>'Reunion','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Saint Helena'=>'Saint Helena','Saint Kitts And Nevis'=>'Saint Kitts And Nevis','Saint Lucia'=>'Saint Lucia','Saint Pierre And Miquelon'=>'Saint Pierre And Miquelon','Saint Vincent And The Grenadines'=>'Saint Vincent And The Grenadines','San Marino'=>'San Marino','Sao Tome And Principe'=>'Sao Tome And Principe','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovak Republic'=>'Slovak Republic','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','South Georgia And South Sandwich Islands'=>'South Georgia And South Sandwich Islands','South Korea'=>'South Korea','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Svalbard And Jan Mayen'=>'Svalbard And Jan Mayen','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tokelau'=>'Tokelau','Tonga'=>'Tonga','Trinidad And Tobago'=>'Trinidad And Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Turks And Caicos Islands'=>'Turks And Caicos Islands','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','United States Minor Outlying Islands'=>'United States Minor Outlying Islands','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Vatican City (Holy See)'=>'Vatican City (Holy See)','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Virgin Islands (British)'=>'Virgin Islands (British)','Virgin Islands (US)'=>'Virgin Islands (US)','Wallis And Futuna Islands'=>'Wallis And Futuna Islands','Western Sahara'=>'Western Sahara','Western Samoa'=>'Western Samoa','Yemen'=>'Yemen','Yugoslavia'=>'Yugoslavia','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe');
        $this->set('countryarr', json_encode($countries));

		$identityid=0;
		if(isset($employee['identity']['id'])){
			$identityid=$employee['identity']['id'];
		}

		$experienceid=0;
			if(isset($employee['experience']['id'])){
				$experienceid=$employee['experience']['id'];
			}
			$experiences = $this->Employees->Experiences->find('all')->where("Experiences.employee_id=".$id)->andwhere("Experiences.id!=".$experienceid)
							->andwhere("Experiences.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('experiences', json_encode($experiences));

			$skillid=0;
			if(isset($employee['skill']['id'])){
				$skillid=$employee['skill']['id'];
			}
			$skills = $this->Employees->Skills->find('all')->where("Skills.employee_id=".$id)->andwhere("Skills.id!=".$skillid)
							->andwhere("Skills.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('skills', json_encode($skills));

			$assetid=0;
			if(isset($employee['office_asset']['id'])){
				$assetid=$employee['office_asset']['id'];
			}
			$assets = $this->Employees->OfficeAssets->find('all')->where("OfficeAssets.employee_id=".$id)->andwhere("OfficeAssets.id!=".$assetid)
							->andwhere("OfficeAssets.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('assets', json_encode($assets));


			$qualificationid=0;
			if(isset($employee['educational_qualification']['id'])){
				$qualificationid=$employee['educational_qualification']['id'];
			}
			$qualifications = $this->Employees->EducationalQualifications->find('all')->where("EducationalQualifications.employee_id=".$id)->andwhere("EducationalQualifications.id!=".$qualificationid)
							->andwhere("EducationalQualifications.customer_id=".$this->loggedinuser['customer_id']);
			$this->set('qualifications', json_encode($qualifications));

		$ids = $this->Employees->Identities->find('all')->where("Identities.employee_id=".$id)->andwhere("Identities.id!=".$identityid)
							->andwhere("Identities.customer_id=".$this->loggedinuser['customer_id']);
		$this->set('ids', json_encode($ids));

		$this->loadModel('Addresses');
        $address = $this->Addresses->find('all')->where("Addresses.employee_id=".$id)->andwhere("Addresses.address_type='2'")
							->andwhere("Addresses.customer_id=".$this->loggedinuser['customer_id']);
		$this->set('addresses',  json_encode($address));
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
	   	    $this->Flash->error(__('You are not authorized to delete the record.'));
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
					$this->Flash->success(__('Selected Employees have been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Employees could not be deleted. Please, try again.'));
				}

		   }
             return $this->redirect(['action' => 'index']);
     }
}
