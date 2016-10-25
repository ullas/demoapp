<style>
label.mandatory:after {
    content: ' *';
    color: #ff5a4d;
    display: inline;
}
[class^='select2'] {
  border-radius: 0px !important;
}
.select2-container--default .select2-selection--single{
  border:1px solid #D2D6DE;
}
</style>
<section class="content-header">
      <h1>
        Legal Entity
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-university"></i> Legal Entity</li>
        <li class="active">Add</li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'LegalEntities', 'action' => 'index')); ?>">List</a></li>
      </ol>
</section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($legalEntity) ?>
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
            echo $this->Form->input('country_of_registration',['class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('standard_weekly_hours');
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('currency',['class'=>'select2','options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('official_language',['class'=>'select2','options' => $this->Language->get_languages(), 'empty' => true]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory']]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('location_id', ['class'=>'select2','options' => $locations, 'empty' => true]);
            echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('paygroup_id', ['class'=>'select2','label'=>['text'=>'Pay Group'],'options' => $payGroups, 'empty' => true]);
            echo "</div>";
            echo "</div>";
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Legal Entity'),['title'=>'Save Legal Entity','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
</section>
<!-- Date picker -->
<?php
$this->Html->css([
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/select2/select2.full.min',
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $(".select2").select2({ width: '100%' });
    $('#effective_start_date').datepicker({
      autoclose: true
    });
     $('#effective_end_date').datepicker({
      autoclose: true
    });
    // var sidebar_height = $(".sidebar").height();alert("sidebar:"+sidebar_height);
  });
</script>
<?php $this->end(); ?>
