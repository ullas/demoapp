<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Job Class
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($jobclass) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Job Code','disabled'=>true]);
            echo $this->Form->input('name',['label' => 'Job Title']);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive')]);
            echo $this->Form->input('effective_start_date', ['value' => !empty($jobclass->effective_start_date) ? $jobclass->effective_start_date->format($mptldateformat) : '','label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['value' => !empty($jobclass->effective_end_date) ? $jobclass->effective_end_date->format($mptldateformat) : '','label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('worker_comp_code',['label' => 'Workers Comp Code']);
            echo $this->Form->input('joblevel_id',['label' => 'Job Level', 'class' => 'select2', 'empty' => true]);
            echo $this->Form->input('standard_weekly_hours');
            echo $this->Form->input('regular_temporary',['label' => 'Regular/Temporary','class'=>'select2','options' => array('Regular'=>'Regular','Temporary'=> 'Temporary')]);
            echo $this->Form->input('employee_class_id',['label' => 'Employee Class', 'empty' => true]);
            echo $this->Form->input('full_time_employee');
            echo $this->Form->input('supervisor_level_id',['label' => 'Supervisor Level', 'empty' => true]);
            echo $this->Form->input('pay_grade_id', ['class' => 'select2','options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('job_function_id', ['class' => 'select2','options' => $jobFunctions, 'empty' => true]);
        ?>
    </fieldset>
     <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Job Class'),['title'=>'Update Job Class','class'=>'pull-right']) ?>
</div>
    <?= $this->Form->end() ?>
</div></div></section>
