<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;

	class ActionPopoupDatatableComponent extends Component {
										  
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
            		'type'=>$value['type'],
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
            	'formatter' => function( $d, $row ,$modalname) {
                	$buttons='<a href="/'.   $modalname  . '/view/'.$d.'" data-remote="false" data-toggle="modal" data-target="#actionspopover" class="disLink open-Popup fa fa-file-text-o p3"></a>
                					<a href="/'.   $modalname  . '/edit/'.$d.'" data-remote="false" data-toggle="modal" data-target="#actionspopover" class="disLink open-Popup fa fa-pencil p3 text-aqua"></a>
									<form name="formdelete" id="formdelete' .$d. '" method="post" action="/'.   $modalname  . '/delete/'.$d.'" style="display:none;" >
                                   <input type="hidden" name="_method" value="POST"></form>
                                   <a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete # '.$d.'?&quot; , function(){ document.getElementById(&quot;formdelete'.$d.'&quot;).submit(); })
                                    event.returnValue = false; return false;" class="disLink fa fa-trash text-red" style= "padding:3px"></a>';
						
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
				
		   		
			$data = $model->find('all')->where($wherestr)/*->where($wherecustomer)*/->contain($contains)->order($order)->limit($limit)->page($page)->toArray();
			
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
                           if($row[ $column['dt'] ]=="" && $colname[0][0]==$controller->name){
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
				
	}
?>