<?= $this->element('templateelmnt'); ?>

<section class="content-header">
      <h1>
        Leave Request
        <small>View</small>
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
            echo $this->Form->input('time_type_id', ['options' => $timeTypes, 'empty' => true,'disabled'=>true]);
            // echo $this->Form->input('status');
            echo $this->Form->input('start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);
            echo $this->Form->input('end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);
            // echo $this->Form->input('created_by');
            // echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?=$this->Html->link(__('Edit LeaveRequest'), ['action' => 'edit', $employeeAbsencerecord['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
    </div>
    <?= $this->Form->end() ?>
</div></div>

<div class="row">

<div class="col-md-9">
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Application Status</h3>
    </div>
	<div class="box-body">
		<ul class="timeline timeline-inverse">
			<!-- timeline time label -->
    		<li class="time-label">
        		<span class="bg-aqua-gradient"><?php echo $employeeAbsencerecord["start_date"] ;  ?></span>
    		</li>
    		<!-- status=0 for pending,1 for approved,2 for denied,3 for skipped by time    -->
    		<?php  foreach ($workflowhistory as $value): ?>
    			
    			<?= $this->element('statuselement', array('title' => $value['user']['username'], 'subtitle'=>$value['status'], 'status' => "0", 'time' => $value['updatetime'] )); ?>
    		
    		<?php endforeach; ?>
    		
    		<!-- END timeline item -->
    		<li class="time-label">
        		<span class="bg-olive"><?php echo $employeeAbsencerecord["end_date"] ;  ?></span>
    		</li>
    	</ul>
	</div>
</div>
</div>

<div class="col-md-3">
</div>
	
</div>
</section>