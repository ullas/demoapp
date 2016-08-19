<section class="content-header">
      <h1>
        Business Unit
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-briefcase"></i> Business Unit</li>
        <li class="active">Add</li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'BusinessUnits', 'action' => 'index')); ?>">List</a></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-default"><div class="box-body">
    <fieldset>
        <legend><?= __('Add Business Unit') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo "<div class='form-group'><label>Effective Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_start_date'></div></div>";
            echo "<div class='form-group'><label>Effective End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_end_date'></div></div>";
            echo $this->Form->input('external_code');
            echo $this->Form->input('head_of_unit');
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
    $('#effective_start_date').datepicker({
      autoclose: true
    }); 
     $('#effective_end_date').datepicker({
      autoclose: true
    });
  });
</script>
<?php $this->end(); ?>