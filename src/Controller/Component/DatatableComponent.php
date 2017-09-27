<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;

	class DatatableComponent extends Component {
										  
		public function getView($fields,$contains,$usrFilter) 
		{
			$length = count($fields);
			$colmns = array();
			$i = 0;
			foreach($fields as $value){
				if($value['type']=='boolean'){
					
					$colmns[] =array( 
            		'db' => $value['name'], 
            		'dt' => $i++,
            		'type'=>'boolean',
            		'formatter' => function( $d, $row ,$modalname) {
                		$div='<div class="mptldtbool">'.$d.'</div>';
                		return $div;
            		}
       				);
					
				}else{
					if(is_array($value)) {
          				$colmns[] = array("db" => $value['name'] , "dt" => $i++,'type'=>$value['type']);
        			}else{
        				$colmns[] = array("db" => $value , "dt" => $i++,'type'=>$value['type']);
        			}
				}
        		
    		}
	
			$colmns[] =array( 
            	'db' => 'id', 
            	'dt' => $length++,
            	'type'=>'button',
            	'formatter' => function( $d, $row ,$modalname) {
            		(isset($row["name"])) ? $displayname=$row["name"] : $displayname="# " .$d ;
                	$buttons='<a href="/'.   $modalname  . '/view/'.$d.'" class="viewlink fa fa-file-text-o p3"></a>
                					<a href="/'.   $modalname  . '/edit/'.$d.'" class="editlink fa fa-pencil p3 text-aqua"></a>
									<form name="formdelete" id="formdelete' .$d. '" method="post" action="/'.   $modalname  . '/delete/'.$d.'" style="display:none;" >
                                   <input type="hidden" name="_method" value="POST"></form>
                                   <a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete '.$displayname.' ?&quot; , function(){ document.getElementById(&quot;formdelete'.$d.'&quot;).submit(); })
                                    event.returnValue = false; return false;" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';
						
                	return $buttons;
            	}
       		);
			//getting orderby
	   		$order = $this->Order( $colmns );
			//getting filter
			$where = $this->Filter( $colmns, $fields );
			
			//getting limit
			$limit = $this->Limit( );
			//getting page no
			$page=ceil($this->request->query['start']/$limit)+1;
			
			$controller = $this->_registry->getController();
			$wherecustomer=$this->request->params['controller'].".customer_id=".$this->loggedinuser['customer_id'];
			
			$model=$controller->loadModel($controller->modelClass);

			$wherestr="";
			
			if(strlen($usrFilter)>3){
           	    $wherestr=$usrFilter;
           	}
           	
           	$filterstr="";
			foreach($where  as $key => $value){
				if($filterstr != ''){$filterstr.=" OR ";}
				$filterstr.=$key. " '". $value. "'";
			}
				
			if($filterstr != ''){$wherestr.= " and (".$filterstr .")" ; }
				
			
		   		
			$data = $model->find('all')->where($wherestr)->contain($contains)->order($order)->limit($limit)->page($page)->toArray();
			
			//getting totalcount
			$totalCount = $model->find()->contain($contains)->count();
			//getting filteredcount
			$filteredCount = $model->find()->contain($contains)->where($wherestr)->count();
		
			$output =$this->GetData($colmns,$data,$totalCount,$filteredCount);
        	return $output;
		}
		public function Limit(){
			$limit = '';
			if ( isset($this->request->query['start']) && $this->request->query['length'] != -1 ) {
				$limit = intval($this->request->query['length']);
			}
			return $limit;
		}
		function formatmptlDate($val){debug($val->time);
			// if($mptldateformat='d/m/Y'){
				$output=explode("".$val,"-");
			  	// $fnl=$output[2]. "-" . $output[1] . "-". $output[0];
			// }else if($mptldateformat='m/d/Y'){
				
			// }
			return count($output);
		}
		function validateDate($date, $format)
		{
    		$d = \DateTime::createFromFormat($format, $date);
    		return $d && $d->format($format) == $date;
		}
		function isBoolean($value) {
   			if ($value && (strtolower($value) == "false" || strtolower($value) == "true")){
      			return true;
   			} else {
      			return false;
   			}
		}		
		function isItValidDate($date) {
  			if(preg_match("/^(\d{2})\/(\d{2})\/(\d{2})$/", $date, $matches))
   			{
    			if(checkdate($matches[2], $matches[1], $matches[3]))
      			{
       				return true; 
      			}
   			}
 		}
		function get_country_name($country_id = null) 
		{
			$countries = array('Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','American Samoa'=>'American Samoa','Andorra'=>'Andorra','Angola'=>'Angola','Anguilla'=>'Anguilla','Antarctica'=>'Antarctica','Antigua And Barbuda'=>'Antigua And Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Aruba'=>'Aruba','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bermuda'=>'Bermuda','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia And Herzegovina'=>'Bosnia And Herzegovina','Botswana'=>'Botswana','Bouvet Island'=>'Bouvet Island','Brazil'=>'Brazil','British Indian Ocean Territory'=>'British Indian Ocean Territory','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Cayman Islands'=>'Cayman Islands','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Christmas Island'=>'Christmas Island','Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands','Columbia'=>'Columbia','Comoros'=>'Comoros','Congo'=>'Congo','Cook Islands'=>'Cook Islands','Costa Rica'=>'Costa Rica','Cote D\'Ivorie (Ivory Coast)'=>'Cote D\'Ivorie (Ivory Coast)','Croatia (Hrvatska)'=>'Croatia (Hrvatska)','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Democratic Republic Of Congo (Zaire)'=>'Democratic Republic Of Congo (Zaire)','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor'=>'East Timor','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Falkland Islands (Malvinas)'=>'Falkland Islands (Malvinas)','Faroe Islands'=>'Faroe Islands','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','French Guinea'=>'French Guinea','French Polynesia'=>'French Polynesia','French Southern Territories'=>'French Southern Territories','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Gibraltar'=>'Gibraltar','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guadeloupe'=>'Guadeloupe','Guam'=>'Guam','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Heard And McDonald Islands'=>'Heard And McDonald Islands','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macau'=>'Macau','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Martinique'=>'Martinique','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mayotte'=>'Mayotte','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Montserrat'=>'Montserrat','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar (Burma)'=>'Myanmar (Burma)','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','Netherlands Antilles'=>'Netherlands Antilles','New Caledonia'=>'New Caledonia','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Niue'=>'Niue','Norfolk Island'=>'Norfolk Island','North Korea'=>'North Korea','Northern Mariana Islands'=>'Northern Mariana Islands','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Pitcairn'=>'Pitcairn','Poland'=>'Poland','Portugal'=>'Portugal','Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Reunion'=>'Reunion','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Saint Helena'=>'Saint Helena','Saint Kitts And Nevis'=>'Saint Kitts And Nevis','Saint Lucia'=>'Saint Lucia','Saint Pierre And Miquelon'=>'Saint Pierre And Miquelon','Saint Vincent And The Grenadines'=>'Saint Vincent And The Grenadines','San Marino'=>'San Marino','Sao Tome And Principe'=>'Sao Tome And Principe','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovak Republic'=>'Slovak Republic','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','South Georgia And South Sandwich Islands'=>'South Georgia And South Sandwich Islands','South Korea'=>'South Korea','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Svalbard And Jan Mayen'=>'Svalbard And Jan Mayen','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tokelau'=>'Tokelau','Tonga'=>'Tonga','Trinidad And Tobago'=>'Trinidad And Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Turks And Caicos Islands'=>'Turks And Caicos Islands','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','United States Minor Outlying Islands'=>'United States Minor Outlying Islands','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Vatican City (Holy See)'=>'Vatican City (Holy See)','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Virgin Islands (British)'=>'Virgin Islands (British)','Virgin Islands (US)'=>'Virgin Islands (US)','Wallis And Futuna Islands'=>'Wallis And Futuna Islands','Western Sahara'=>'Western Sahara','Western Samoa'=>'Western Samoa','Yemen'=>'Yemen','Yugoslavia'=>'Yugoslavia','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe');
        	if (array_key_exists($country_id,$countries)){
        		return $countries[$country_id];
			}else{
				return "";
			}
		}	
		function get_country_key($country_id = null) 
		{
			$countries = array('Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','American Samoa'=>'American Samoa','Andorra'=>'Andorra','Angola'=>'Angola','Anguilla'=>'Anguilla','Antarctica'=>'Antarctica','Antigua And Barbuda'=>'Antigua And Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Aruba'=>'Aruba','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bermuda'=>'Bermuda','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia And Herzegovina'=>'Bosnia And Herzegovina','Botswana'=>'Botswana','Bouvet Island'=>'Bouvet Island','Brazil'=>'Brazil','British Indian Ocean Territory'=>'British Indian Ocean Territory','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Cayman Islands'=>'Cayman Islands','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Christmas Island'=>'Christmas Island','Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands','Columbia'=>'Columbia','Comoros'=>'Comoros','Congo'=>'Congo','Cook Islands'=>'Cook Islands','Costa Rica'=>'Costa Rica','Cote D\'Ivorie (Ivory Coast)'=>'Cote D\'Ivorie (Ivory Coast)','Croatia (Hrvatska)'=>'Croatia (Hrvatska)','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Democratic Republic Of Congo (Zaire)'=>'Democratic Republic Of Congo (Zaire)','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor'=>'East Timor','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Falkland Islands (Malvinas)'=>'Falkland Islands (Malvinas)','Faroe Islands'=>'Faroe Islands','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','French Guinea'=>'French Guinea','French Polynesia'=>'French Polynesia','French Southern Territories'=>'French Southern Territories','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Gibraltar'=>'Gibraltar','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guadeloupe'=>'Guadeloupe','Guam'=>'Guam','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Heard And McDonald Islands'=>'Heard And McDonald Islands','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macau'=>'Macau','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Martinique'=>'Martinique','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mayotte'=>'Mayotte','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Montserrat'=>'Montserrat','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar (Burma)'=>'Myanmar (Burma)','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','Netherlands Antilles'=>'Netherlands Antilles','New Caledonia'=>'New Caledonia','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Niue'=>'Niue','Norfolk Island'=>'Norfolk Island','North Korea'=>'North Korea','Northern Mariana Islands'=>'Northern Mariana Islands','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Pitcairn'=>'Pitcairn','Poland'=>'Poland','Portugal'=>'Portugal','Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Reunion'=>'Reunion','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Saint Helena'=>'Saint Helena','Saint Kitts And Nevis'=>'Saint Kitts And Nevis','Saint Lucia'=>'Saint Lucia','Saint Pierre And Miquelon'=>'Saint Pierre And Miquelon','Saint Vincent And The Grenadines'=>'Saint Vincent And The Grenadines','San Marino'=>'San Marino','Sao Tome And Principe'=>'Sao Tome And Principe','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovak Republic'=>'Slovak Republic','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','South Georgia And South Sandwich Islands'=>'South Georgia And South Sandwich Islands','South Korea'=>'South Korea','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Svalbard And Jan Mayen'=>'Svalbard And Jan Mayen','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tokelau'=>'Tokelau','Tonga'=>'Tonga','Trinidad And Tobago'=>'Trinidad And Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Turks And Caicos Islands'=>'Turks And Caicos Islands','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','United States Minor Outlying Islands'=>'United States Minor Outlying Islands','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Vatican City (Holy See)'=>'Vatican City (Holy See)','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Virgin Islands (British)'=>'Virgin Islands (British)','Virgin Islands (US)'=>'Virgin Islands (US)','Wallis And Futuna Islands'=>'Wallis And Futuna Islands','Western Sahara'=>'Western Sahara','Western Samoa'=>'Western Samoa','Yemen'=>'Yemen','Yugoslavia'=>'Yugoslavia','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe');
        	$countries = array_map('strtolower', $countries);
        	if (in_array($country_id,$countries)){
        		$countries = array_flip($countries);
        		return $countries[$country_id];
			}
			else{
				return "nullkey";
			}
		}	
		public function Filter( $columns, $fields ){
			
			$fmt=$this->_registry->getController()->daytimeFormat;
			
			$countryfields=array("HolidayCalendars.country","TimeTypeProfiles.country","WorkSchedules.country","Empdatapersonals.nationality");
						  
			$globalSearch = [];
			// $columnSearch = array();
			$dtColumns = $this->pluck( $columns, 'dt' );
			if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) {
				$str = $this->request->query['search']['value'];
				$str = pg_escape_string($str);
				for ( $i=0, $ien=count($this->request->query['columns']) ; $i<$ien ; $i++ ) {
					$requestColumn = $this->request->query['columns'][$i];
					$columnIdx = array_search( $requestColumn['data'], $dtColumns );
					$column = $columns[ $columnIdx ];
					if ( $requestColumn['searchable'] == 'true' ) {
						
						foreach($fields as $rowval){
							$columnname="";
							$columnname[]=explode(".",$rowval['name']);
							
							if( ($rowval['name']==$column['db']) && ($rowval['type']=="character") ){
								// if ((in_array($rowval['name'], $countryfields))){
									// $globalSearch[$column['db'].' ILIKE'] = "%" . $this->get_country_key($str). "%";
								// }else
								 if( ( (($columnname[0][1])=="status") || (($columnname[0][1])=="effective_status") ) && ($columnname[0][0]!="EmployeeAbsencerecords") ){
									if(strtolower($str)=="active"){
										$globalSearch[$column['db'].' ILIKE'] = "%" . 0 . "%";
									}else if($str=="inactive"){
										$globalSearch[$column['db'].' ILIKE'] = "%" . 1 . "%";
									}
								}else{								
									$globalSearch[$column['db'].' ILIKE'] = "%" . $str . "%";
								}
							}
							else if( ($rowval['name']==$column['db']) && ($rowval['type']=="number") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
							   }
                            }
							//else if( ($rowval['name']==$column['db']) && ($rowval['type']=="date") ){
									//$globalSearch[$column['db'].'::text LIKE'] = "%" . $str. "%";
							//}
							else if( ($rowval['name']==$column['db']) && ($rowval['type']=="date") ){
								if($fmt==1){
									$globalSearch['TO_CHAR('.$column['db'].', \'dd/MM/YYYY\') LIKE'] = "%" . $str. "%";
								}else{
									$globalSearch['TO_CHAR('.$column['db'].', \'MM/dd/YYYY\') LIKE'] = "%" . $str. "%";
								}
							}
							else if( ($rowval['name']==$column['db']) && ($rowval['type']=="boolean") ){
								if($this->isBoolean($str) === true){
									$globalSearch[$column['db'].' ='] =  $str;
								}
							}
						}
					
					}
				}
			}
			
			
			// if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) {
				// $str = $this->request->query['search']['value'];
				// $globalSearch["name LIKE"] = "%" . $str. "%";
			// }
			
			// Individual column filtering
			// for ( $i=0, $ien=count($this->request->query['columns']) ; $i<$ien ; $i++ ) {
				// $requestColumn = $this->request->query['columns'][$i];
				// $columnIdx = array_search( $requestColumn['data'], $dtColumns );
				// $column = $columns[ $columnIdx ];
				// $str = $requestColumn['search']['value'];
				// $str = pg_escape_string($str);
				// if ( $requestColumn['searchable'] == 'true' && $str != '' ) {
					// $columnSearch[] = " {$column['db']}::varchar ILIKE '%$str%'";
				// }
			// }
			// Combine the filters into a single string
			// $where = '';
			// if ( count( $globalSearch ) ) {
				// $where = '('.implode(' OR ', $globalSearch).')';
			// }
			// if ( count( $columnSearch ) ) {
				// $where = $where === '' ?
					// implode(' AND ', $columnSearch) :
					// $where .' AND '. implode(' AND ', $columnSearch);
			// }
			//Agrega filtro general personalizado
			// if ($filtroAdd !== NULL ){
				// if ( $where !== '' ) {
					// $where = $filtroAdd.' AND '.$where;
				// } else {
					// $where = $filtroAdd;
				// }						
			// }
		
			// if ( $where !== '' ) {
				// $where = 'WHERE '.$where;
			// }
			return $globalSearch;
		}
		public function Order ( $columns )
		{
			$controller = $this->_registry->getController();
			$order = array();
			if ( isset($this->request->query['order']) && count($this->request->query['order']) ) {
				$orderBy = array();
				$dtColumns = $this->pluck( $columns, 'dt' );
				for ( $i=0, $ien=count($this->request->query['order']) ; $i<$ien ; $i++ ) {
					// Convert the column index into the column data property
					$columnIdx = intval($this->request->query['order'][$i]['column']);
					$requestColumn = $this->request->query['columns'][$columnIdx];
					$columnIdx = array_search( $requestColumn['data'], $dtColumns );
					$column = $columns[ $columnIdx ];
					if ( $requestColumn['orderable'] == 'true' ) {
						$dir = $this->request->query['order'][$i]['dir'] === 'asc' ?
							"ASC" :
							"DESC";
						$dbname=$column['db'];
						$orderBy[$dbname] = $dir;
					}
				}
				$order = implode(', ', $orderBy);
			}
			return $orderBy;
		}
		public function pluck ( $a, $prop )
		{
			$out = array();
			for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
				$out[] = $a[$i][$prop];
			}
			return $out;
		}
		public function GetData($columns,$data,$totalCount,$filteredCount){
		
			$controller = $this->_registry->getController();
			$modalname=$controller->modelClass;
				
			$fmt=$this->_registry->getController()->daytimeFormat;
			($fmt==1) ? $mptldateformat='d/m/Y' : $mptldateformat='m/d/Y';
			($fmt==1) ? $mptltimestampformat='d/m/Y H:m a' : $mptltimestampformat='m/d/Y H:m a';
									
			$out = array();
			for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
				$row = array();  
				for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
					$column = $columns[$j];//$row[ "mptlren".$j ] = $columns[$j];  
					if (isset( $column['alias'] )){
						if ($column['alias']!= '' ){
							$c = $column['alias'];
						}else{
							$c = $column['db'];
						}	
					}else{
						$c = $column['db'];
					}
				    
					// Is there a formatter?
                   if ( isset( $column['formatter'] ) ) {
                       $row[ $column['dt'] ] = utf8_encode($column['formatter']( $data[$i][ $c ], $data[$i],$modalname ));
                   }
                   else {
                   	if(strpos($c, '.') !== false){
                           $colname="";
                           $colname[]=explode(".",$c);

						   
						  $secmodal=strtolower(Inflector::singularize( $colname[0][0]));
						  if ($secmodal=='template'){
						    $secmodal=$colname[0][0];
						  }
						  
						  $row[ $column['dt'] ] = utf8_encode($data[$i][$secmodal][$colname[0][1]]);
						  //date format on associated controller modals and not the same controller model name before dot
						  $asscontrollerdatefields=array("Employmentinfos.start_date","Empdatabiographies.date_of_birth");
						  if (in_array($c, $asscontrollerdatefields)){
						  		if(($data[$i][$secmodal][$colname[0][1]]!="") && ($data[$i][$secmodal][$colname[0][1]]!=null)){
						  			$row[ $column['dt'] ] = $data[$i][$secmodal][$colname[0][1]]->format($mptldateformat);
								}
						  }
						
                           // $row[ $column['dt'] ] = utf8_encode($data[$i][$secmodal][$colname[0][1]]);
						  
                           //if it is null check the second value from dot seperated in data
                           if(trim($row[ $column['dt'] ])=="" && $colname[0][0]==$controller->name){
                           
                           		if($column['type']=="date"){
									if($data[$i][$colname[0][1]]!="" && $data[$i][$colname[0][1]]!=null){
                           				$row[ $column['dt'] ] = $data[$i][$colname[0][1]]->format($mptldateformat); 
									}
                           		}else if($column['type']=="timestamp"){                           			 
									if($data[$i][$colname[0][1]]!="" && $data[$i][$colname[0][1]]!=null){
                           				$row[ $column['dt'] ] = $data[$i][$colname[0][1]]->format($mptltimestampformat); 
									}
                           		}else{                          			
									$row[ $column['dt'] ] = utf8_encode($data[$i][$colname[0][1]]);     
									//set status to active/inactive
                           			if( ( (($colname[0][1])=="status") || (($colname[0][1])=="effective_status") ) && ($colname[0][0]!="EmployeeAbsencerecords") ){
                           				($row[$column['dt']]=="0") ? $row[$column['dt']]="Active" : $row[$column['dt']]="Inactive" ;
                           			}               			
                           		}
                           }
						   //get country name from code
						   // $countryfields=array("HolidayCalendars.country","TimeTypeProfiles.country","WorkSchedules.country","Empdatapersonals.nationality");
						   // if ((in_array($c, $countryfields)) && ($row[ $column['dt'] ])!=""){
                   				// $row[ $column['dt'] ] = $this->get_country_name($row[ $column['dt'] ]);
						   // }
                       }else{
                           $row[ $column['dt'] ] = utf8_encode($data[$i][$c]);
                       }
                   }
				}
				$out[] = $row;
			}
			return array(
				"draw"            => intval( $this->request->query['draw'] ),
		 		"recordsFiltered"    => $filteredCount,
		 		"recordsTotal" => $totalCount,
		 		"data"            => $out
		 	);
		}
				
	}
?>