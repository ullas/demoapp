<?php

namespace App\Model\Behavior;
use Cake\ORM\Behavior;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Log\Log;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;
use Cake\Event\ArrayObject;
use Cake\Utility\Inflector;

class TimezoneBehavior extends Behavior {

	//Our  format
	var $timezone = 1;
	
	public function initialize(array $config) {//debug("initialize");
		// Some initialization code here
		$this->timezone=$config[0];
		
		
	}
	
	
	// public function beforeSave(Event $event, EntityInterface $entity)
    // {
       // $alias = $event->subject()->alias();
	   // $table = TableRegistry::get($alias);
       // $schema=$table->schema();
	   // $columns=$schema->columns();
	   // $timestampfields=array();
	   // foreach($columns as $field ){
	   	  // $type=$schema->columnType($field);
		  // if(strcmp($type,'timestamp')==0){
		  	 // $timestampfields[]=$field;
		  // }
	   // }
// 	   
	   // foreach($timestampfields as $field){
	   	  // $fvalue = $entity->get($field); 
		  // $result = null;
		  // if( (trim($fvalue)!="") || (trim($fvalue)!=null) ){
// 		  	
			// $userTimezone = new \DateTimeZone($this->timezone);
			// $gmtTimezone = new \DateTimeZone('GMT');
			// $myDateTime = new \DateTime($fvalue, $gmtTimezone);
			// $offset = $userTimezone->getOffset($myDateTime);
			// $myInterval=\DateInterval::createFromDateString((string)$offset . 'seconds');
			// $myDateTime->add($myInterval);
		  	// $result = $myDateTime->format('Y-m-d H:i:s');
		  // }
		  // // Echo $result;
		  // // $fnl=$fvalue->setTimezone(new DateTimeZone('Australia/Melbourne'));
		  // $entity->set($field,$result);
	   // }
// 
// 	  
	   
    // }

}
?>