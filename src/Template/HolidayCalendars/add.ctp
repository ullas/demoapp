<section class="content-header">
      <h1>
        Holiday Calendar
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($holidayCalendar) ?>
    <fieldset>
        <legend><?= __('Add Holiday Calendar') ?></legend>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('name');
            echo $this->Form->input('country');
            echo "<div class='form-group'><label>Effective Start DateValid From:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='valid_from'></div></div>";
			echo "<div class='form-group'><label>Valid To:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='valid_to'></div></div>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
<!-- Date picker -->
<?php
$this->Html->css([
    'AdminLTE./plugins/datepicker/datepicker3'
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datepicker/bootstrap-datepicker'
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () { 
    $('#valid_from').datepicker({
      autoclose: true
    }); 
     $('#valid_to').datepicker({
      autoclose: true
    });
  });
</script>
<?php $this->end(); ?>
