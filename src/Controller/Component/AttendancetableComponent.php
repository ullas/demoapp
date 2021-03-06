<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;

	class AttendancetableComponent extends Component {
										  
		public function getView($fields,$contains,$usrFilter,$desclimit) 
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
					
				}else if($value['type']=='timestamp'){
					if(is_array($value)) {
          				$colmns[] = array("db" => $value['name'] , "dt" => $i++,'type'=>'timestamp');
        			}else{
        				$colmns[] = array("db" => $value , "dt" => $i++,'type'=>'timestamp');
        			}
				}else{
					if(is_array($value)) {
          				$colmns[] = array("db" => $value['name'] , "dt" => $i++,'type'=>'character');
        			}else{
        				$colmns[] = array("db" => $value , "dt" => $i++,'type'=>'character');
        			}
				}
        		
    		}
	
			$colmns[] =array( 
            	'db' => 'id', 
            	'dt' => $length++,
            	'formatter' => function( $d, $row ,$modalname) {
                	$buttons='';
						
                	return $buttons;
            	}
       		);
			//getting orderby
	   		$order = $this->Order( $colmns );
			//getting filter
			$where = $this->Filter( $colmns, $fields );
			
			//getting limit
			if($desclimit){
				$limit = " 5 ";
				$temparr=array();$temparr["Attendance.id"]="DESC";
				$order=$temparr;
			}else{
				$limit = $this->Limit( );
			}
			
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
		function validateDate($date, $format)
		{
    		$d = \DateTime::createFromFormat($format, $date);
    		return $d && $d->format($format) == $date;
		}
		function isBoolean($value) {
   			if ($value && (strtolower($value) == "false" || strtolower($value) == "true")) {
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
		public function Filter( $columns, $fields ){
			$fmt=$this->_registry->getController()->daytimeFormat;
			
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
						
						foreach ($fields as $rowval) {
							if( ($rowval['name']==$column['db']) && ($rowval['type']=="character") ){
								$globalSearch[$column['db'].' ILIKE'] = "%" . $str. "%";
							}
							else if( ($rowval['name']==$column['db']) && ($rowval['type']=="number") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
							   }
                            }
							else if( ($rowval['name']==$column['db']) && ($rowval['type']=="date") ){
								// if($this->isItValidDate($str)){
									$globalSearch[$column['db'].'::text LIKE'] = "%" . $str. "%";
								// }
							}
							else if( ($rowval['name']==$column['db']) && ($rowval['type']=="timestamp") ){
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
                           //if it is null check the second value from dot seperated in data
                           if($row[ $column['dt'] ]=="" && $colname[0][0]==$controller->name){
                           		if($column['type']=="timestamp"){
                           			// $row[ $column['dt'] ] =$this->formatDate(json_encode($data[$i][$colname[0][1]]));
                           			$fmt=$this->_registry->getController()->daytimeFormat;
									$tz=$this->_registry->getController()->timezone;
									if($data[$i][$colname[0][1]]!="" && $data[$i][$colname[0][1]]!=null){
										// ($fmt==1) ? $row[ $column['dt'] ] = $data[$i][$colname[0][1]]->format('d/m/Y H:i:s a')  : $row[ $column['dt'] ] = $data[$i][$colname[0][1]]->format('m/d/Y H:i:s a') ; 
										$serverDate = $data[$i][$colname[0][1]]->format('Y-m-d H:i:s');
										$row[ $column['dt'] ] = $this->convert_to_userdate($serverDate,$tz);
									}
                           		}else{
                               		$row[ $column['dt'] ] = utf8_encode($data[$i][$colname[0][1]]);                           			
                           		}
                           }
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
		
		public function convert_to_userdate($date,$tz)
		{
   			try {
    			$fmt=$this->_registry->getController()->daytimeFormat;
		
        		$userTimezone = new \DateTimeZone($tz);
				$gmtTimezone = new \DateTimeZone('GMT');
				$myDateTime = new \DateTime($date, $gmtTimezone);
				$offset = $userTimezone->getOffset($myDateTime);
				$myInterval=\DateInterval::createFromDateString((string)$offset . 'seconds');
				$myDateTime->add($myInterval);
				($fmt==1) ? $result = $myDateTime->format('d/m/Y H:i:s a')  : $result = $myDateTime->format('m/d/Y H:i:s a') ;
        		return $result;
    		}catch (Exception $e) {
        		return '';
    		}
		}
				
	}
?>