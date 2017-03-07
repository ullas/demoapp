<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Job Class
        <small>Add</small>
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
            echo $this->Form->input('external_code');
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('worker_comp_code');
            echo $this->Form->input('default_job_level');
            echo $this->Form->input('standard_weekly_hours');
            echo $this->Form->input('regular_temporary');
            echo $this->Form->input('default_employee_class');
            echo $this->Form->input('full_time_employee');
            echo $this->Form->input('default_supervisor_level');
            echo $this->Form->input('pay_grade_id', ['class' => 'select2','options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('job_function_id', ['class' => 'select2','options' => $jobFunctions, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save JobClass'),['title'=>'Save JobClass','class'=>'pull-right']) ?> 
</div>
    <?= $this->Form->end() ?>
</div></div></section>

