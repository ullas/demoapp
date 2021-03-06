 <?= $this->element('templateelmnt'); ?>
 
 <section class="content">
	 <?= $this->element('stepformwizardelmnt', array('wcontent' => 'BusinessUnit','wid' => '2')); ?>
 </section>
 
     <section class="content-header">
       <h1>
         Business Unit
         <small>Add</small>
       </h1>
     </section>
 <section class="content">
	 <div class="box box-primary"><div class="box-body">
		 <?= $this->Form->create($businessUnit) ?>
     <fieldset>
        <?php
        	  echo $this->Form->input('external_code',['label'=>['text'=>'Business Unit Code','class'=>'mandatory']]);
            echo $this->Form->input('name',['label'=>['text'=>'Business Unit Name','class'=>'mandatory']]);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('effective_start_date', ['label' =>'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['label' =>'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('head_of_unit',['label' =>'Head of Unit','class'=>'select2','options' => $employees, 'empty' => true]);
         ?>
     </fieldset>
     <div class="box-footer">
    	 <?= $this->Form->button(__('Save Business Unit'),['class'=>'pull-right']) ?>
     </div>
 
     <?= $this->Form->end() ?>
 </div></div></section>



