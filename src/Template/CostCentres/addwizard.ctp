<div class="box"><?= $this->element('stepformwizardelmnt', array('wcontent' => 'CostCenter','wid' => '3')); ?></div>

    <section class="content-header">
      <h1>
        Cost Centre
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($costCentre) ?>
    <fieldset>
        <legend><?= __('Add Cost Centre') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('parent_cost_center');
            echo $this->Form->input('external_code');
            echo $this->Form->input('cost_center_manager');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
