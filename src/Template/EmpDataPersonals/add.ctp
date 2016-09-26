<section class="content-header">
      <h1>
        Emp Data Personal
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($empDataPersonal) ?>
    <fieldset>
        <?php
            echo $this->Form->input('salutation');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('initials');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('first_name_alt1');
            echo $this->Form->input('middle_name_alt1');
            echo $this->Form->input('last_name_alt1');
            echo $this->Form->input('first_name_alt2');
            echo $this->Form->input('middle_name_alt2');
            echo $this->Form->input('last_name_alt2');
            echo $this->Form->input('display_name');
            echo $this->Form->input('formal_name');
            echo $this->Form->input('birth_name');
            echo $this->Form->input('birth_name_alt1');
            echo $this->Form->input('birth_name_alt2');
            echo $this->Form->input('preferred_name');
            echo $this->Form->input('display_name_alt1');
            echo $this->Form->input('display_name_alt2');
            echo $this->Form->input('formal_name_alt1');
            echo $this->Form->input('formal_name_alt2');
            echo $this->Form->input('name_format');
            echo $this->Form->input('is_overridden');
            echo $this->Form->input('nationality',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('second_nationality',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('third_nationality',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('wps_code');
            echo $this->Form->input('uniqueid');
            echo $this->Form->input('prof_legal');
            echo $this->Form->input('exclude_legal');
            echo "<div class='form-group'><label>Nationality Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='nationality_date'></div></div>";
            echo $this->Form->input('home_airport');
            echo $this->Form->input('religion');
            echo $this->Form->input('number_children');
            echo "<div class='form-group'><label>Disability Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='disability_date'></div></div>";
            echo $this->Form->input('disable_group');
            echo $this->Form->input('disable_degree');
            echo $this->Form->input('disable_type');
            echo $this->Form->input('disable_authority');
            echo $this->Form->input('disable_ref');
            echo $this->Form->input('person_id_external');
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
     $('#nationality_date').datepicker({ autoclose: true }); 
     $('#disability_date').datepicker({ autoclose: true }); 
  });
</script>
<?php $this->end(); ?>
