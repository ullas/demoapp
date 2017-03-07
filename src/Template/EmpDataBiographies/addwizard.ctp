<div class="box"><?= $this->element('stepformwizardelmnt', array('wcontent' => 'EmployeeDataBiography','wid' => '6')); ?></div>

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
            echo $this->Form->input('person_id_external');
            echo $this->Form->input('birth_name');
            echo $this->Form->input('date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('country_of_birth');
            echo $this->Form->input('region_of_birth');
            echo $this->Form->input('place_of_birth');
            echo $this->Form->input('date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
