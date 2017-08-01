<?= $this->element('templateelmnt'); ?>

<section class="content-header">
      <h1>
        Leave Request
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($employeeAbsencerecord) ?>
    <fieldset>
        <?php
            // echo $this->Form->input('emp_data_biographies_id', ['options' => $empdatabiographies, 'empty' => true]);
            echo $this->Form->input('time_type_id', ['options' => $timeTypes, 'empty' => true]);
            // echo $this->Form->input('status');
            echo $this->Form->input('start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            // echo $this->Form->input('created_by');
            // echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Leave'),['title'=>'Save Leave','class'=>'mptladd pull-right']) ?>
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
