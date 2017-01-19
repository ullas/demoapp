<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Calendar Assignments
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($calendarAssignment) ?>
    <fieldset>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('assignmentyear');
			echo $this->Form->input('assignmentdate', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('holiday_id', ['options' => $holidays, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    	<?= $this->Form->button(__('Save'),['title'=>'Save','class'=>'pull-right']) ?> 
	</div>
    <?= $this->Form->end() ?>
</div></div></section>
<!-- Date picker -->
<?php
$this->Html->css([  'AdminLTE./plugins/datepicker/datepicker3' ], ['block' => 'css']);
$this->Html->script([ 'AdminLTE./plugins/datepicker/bootstrap-datepicker' ], ['block' => 'script']); ?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () { 
     $('#assignmentdate').datepicker({ autoclose: true }); 
  });
</script>
<?php $this->end(); ?>
