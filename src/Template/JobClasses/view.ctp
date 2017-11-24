<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
     Job Class
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
  	<?= $this->Form->create($jobclass, array('role' => 'form')) ?>
    <fieldset><?php
            echo $this->Form->input('external_code',['label' => 'Job Code','disabled'=>true]);
            echo $this->Form->input('name',['label' => 'Job Title','disabled'=>true]);
            echo $this->Form->input('description',['disabled'=>true]);
            echo $this->Form->input('effective_status',['label' => 'Status','disabled'=>true,'class'=>'select2','options' => array('Active', 'Inactive')]);
            echo $this->Form->input('effective_start_date', ['value' => !empty($jobclass->effective_start_date) ? $jobclass->effective_start_date->format($mptldateformat) : '','label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);
            echo $this->Form->input('effective_end_date', ['value' => !empty($jobclass->effective_end_date) ? $jobclass->effective_end_date->format($mptldateformat) : '','label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);
            echo $this->Form->input('worker_comp_code',['label' => 'Workers Comp Code','disabled'=>true]);
            echo $this->Form->input('joblevel_id',['label' => 'Job Level', 'class' => 'select2', 'empty' => true,'disabled'=>true]);
            echo $this->Form->input('standard_weekly_hours',['disabled'=>true]);
            echo $this->Form->input('regular_temporary',['label' => 'Regular/Temporary','disabled'=>true,'class'=>'select2','options' => array('Regular'=>'Regular','Temporary'=> 'Temporary')]);
            echo $this->Form->input('employee_class_id',['label' => 'Employee Class','disabled'=>true]);
            echo $this->Form->input('full_time_employee',['disabled'=>true]);
            echo $this->Form->input('supervisor_level_id',['label' => 'Supervisor Level','disabled'=>true]);
            echo $this->Form->input('pay_grade_id', ['class' => 'select2','options' => $payGrades, 'empty' => true,'disabled'=>true]);
            echo $this->Form->input('job_function_id', ['class' => 'select2','options' => $jobFunctions, 'empty' => true,'disabled'=>true]);
        ?></fieldset>
        <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Job Class'), ['action' => 'edit', $jobclass['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
