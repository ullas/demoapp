<section class="content-header">
      <h1>
        Legal Entity
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-university"></i> Legal Entity</li>
        <li class="active">Edit</li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'LegalEntities', 'action' => 'add')); ?>">Add</a></li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'LegalEntities', 'action' => 'index')); ?>">List</a></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
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
            echo $this->Form->input('country_of_registration',['options' => $countries, 'empty' => true]);
            echo $this->Form->input('standard_weekly_hours');
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
