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
</div></div></section>