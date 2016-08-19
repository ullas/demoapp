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
	<div class="box box-default"><div class="box-body">
    <?= $this->Form->create($legalEntity) ?>
    <fieldset>
                       
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            // echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo "<div class='form-group'><label>Effective Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_start_date'></div></div>";
            // echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo "<div class='form-group'><label>Effective End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_end_date'></div></div>";
            echo $this->Form->input('country_of_registration',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('standard_weekly_hours',['options' => $hours, 'empty' => true]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('official_language',['options' => $this->Language->get_languages(), 'empty' => true]);
            echo $this->Form->input('external_code');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('paygroup_id', ['options' => $payGroups, 'empty' => true]);
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
