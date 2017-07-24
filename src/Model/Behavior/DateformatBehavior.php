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

class DateformatBehavior extends Behavior {

	//Our  format
	var $dateFormat = 1;
	
	public function initialize(array $config) {//debug("initialize");
		// Some initialization code here
		$this->dateFormat=$config[0];
		
		
	}
	public function beforeFind(Event $event, Query $query, $options){//debug($event);
		
	}
	public function beforeSave(Event $event, EntityInterface $entity)
    {
       $alias = $event->subject()->alias();
	   $table = TableRegistry::get($alias);
       $schema=$table->schema();
	   $columns=$schema->columns();
	   $timestampfields=array();
	   foreach($columns as $field ){
	   	  $type=$schema->columnType($field);
		  if(strcmp($type,'date')==0 && !in_array($field,['created','modified','run_date'])){
		  	 $timestampfields[]=$field;
		  }
	   }
	   foreach($timestampfields as $field){
	   	  $fvalue= $entity->get($field);
		  
		  if(strlen($fvalue)>6){
		  	$result=explode("/",explode(" ",$fvalue)[0]);
			if($this->dateFormat==1) { 
			  $fnl=$result[2]. "-" . $result[1] . "-". $result[0 ];
			}else{
			   $fnl=$result[2]. "-" . $result[0] . "-". $result[1 ];
			}
			$entity->set($field,$fnl);
		  }
	   }
	  
	   
    }

}
?>