<section class="content-header">
      <h1>
        Division
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($division) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo "<div class='form-group'><label>Effective Start Date:</label><div class='input-group'>";
            echo "<input type='text' class='form-control' id='effective_start_date' name='effective_start_date'></div></div>";
            echo "<div class='form-group'><label>Effective End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_end_date' name='effective_end_date'></div></div>";
            echo $this->Form->input('parent_division');
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
