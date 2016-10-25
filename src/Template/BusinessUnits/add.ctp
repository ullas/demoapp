<style>
label.mandatory:after {
    content: ' *';
    color: #ff5a4d;
    display: inline;
}
</style>
<section class="content-header">
      <h1>
        Business Unit
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
		<?= $this->Form->create($businessUnit) ?>
    <fieldset>
        <?php
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('name',['label'=>['text'=>'Name','class'=>'mandatory']]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('description');
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('effective_status');
            echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'><label>Effective Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_start_date'></div></div>";
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'><label>Effective End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_end_date'></div></div>";
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory']]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('head_of_unit');
            echo "</div>";
            echo "</div>";
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Business Unit'),['class'=>'pull-right']) ?>
  </div>
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
