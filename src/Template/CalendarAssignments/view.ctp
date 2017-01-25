<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Calendar Assignment
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
        <?= $this->Form->create($calendarAssignment, array('role' => 'form')) ?>
          <fieldset>
          	<?php
            	echo $this->Form->input('calendar', ['options' => $holidayCalendars, 'class' => 'select2','disabled'=>true]);
            	echo $this->Form->input('assignmentyear', ['class' => 'mptlyp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);
				echo $this->Form->input('assignmentdate', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);
            	echo $this->Form->input('holiday_id', ['options' => $holidays, 'class' => 'select2','disabled'=>true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Calendar Assignment'), ['action' => 'edit', $calendarAssignment['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div>
</section>
