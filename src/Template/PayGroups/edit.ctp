<section class="content-header">
      <h1>
        Pay Group
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payGroup) ?>
    <fieldset>
        <legend><?= __('Edit Pay Group') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo "<div class='form-group'><label>Effective Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_start_date'></div></div>";
            echo "<div class='form-group'><label>Effective End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_end_date'></div></div>";
            echo "<div class='form-group'><label>Earliest Change Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='earliest_change_date'></div></div>";
            echo $this->Form->input('payment_frequency');
            echo $this->Form->input('primary_contactid');
            echo $this->Form->input('primary_contact_email');
            echo $this->Form->input('primary_contact_name');
            echo $this->Form->input('secondary_contactid');
            echo $this->Form->input('secondary_contact_email');
            echo $this->Form->input('secondary_contact_name');
            echo $this->Form->input('weeks_in_pay_period');
            echo $this->Form->input('data_delimiter');
            echo $this->Form->input('decimal_point');
            echo $this->Form->input('lag');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div></section>
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
     $('#earliest_change_date').datepicker({
      autoclose: true
    });
  });
</script>
<?php $this->end(); ?>
