		<?= $this->element('stepformwizardelmnt', array('wcontent' => 'EmployeeDataBiography','wid' => '6')); ?>

<section class="content-header">
      <h1>
        Emp Data Biography
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($empDataBiography) ?>
    <fieldset>
        <?php
            echo "<div class='form-group'><label>Date of birth</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='date_of_birth'></div></div>";
            echo $this->Form->input('country_of_birth');
            echo $this->Form->input('region_of_birth');
            echo $this->Form->input('place_of_birth');
            echo $this->Form->input('birth_name');
			echo "<div class='form-group'><label>Date of death</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='date_of_death'></div></div>";
            echo $this->Form->input('person_id_external');
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
     $('#date_of_birth').datepicker({
      autoclose: true
    });
     $('#date_of_death').datepicker({
      autoclose: true
    });
  });
</script>
<?php $this->end(); ?>
