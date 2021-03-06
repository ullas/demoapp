<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Pay Component Group
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payComponentGroup, array( 'novalidate' => true) ) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Pay Component Group Code']);
            echo $this->Form->input('name',['label' => 'Pay Component Group Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status',['class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('show_on_comp_ui',['label'=>'Display on Comp UI','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_comparatio_calc',['label'=>'Use for Comparatio Calculation','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_range_penetration',['label'=>'Use for Range Penetration','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('sort_order');
            echo $this->Form->input('system_defined');
        ?>
    </fieldset>
   <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Pay Component Group'),['title'=>'Save Pay Component Group','class'=>'mptladd pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
<?php $this->start('scriptBotton'); ?>
<script>
$(function () {
    $('.mptladd').click(function(e){
    	var startdate = $("#start-date").val();
    	var enddate = $("#end-date").val();
    	if(startdate=="" || startdate==null || enddate=="" || enddate==null){
    		sweet_alert("Start/End Date missing.");
			return false;
    	}

		if(!(compareStartEndDate(startdate,enddate))){
    		sweet_alert("Please ensure that the End Date is greater than or equal to the Start Date.");
			return false;
    	}
 	});
});
</script>
<?php $this->end(); ?>
