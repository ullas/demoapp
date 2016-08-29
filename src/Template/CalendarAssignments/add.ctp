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
        <legend><?= __('Add Calendar Assignment') ?></legend>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('assignmentyear');
            echo "<div class='form-group'><label>Assignment Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='assignmentdate'></div></div>";
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('holiday_id', ['options' => $holidays, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
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
