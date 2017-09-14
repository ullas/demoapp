<?= $this->element('templateelmnt'); ?>

<section class="content" style="padding: 1px;min-height:150px;">
	<?= $this->element('stepformwizardelmnt', array('wcontent' => 'CostCenter','wid' => '3')); ?>
</section>

    <section class="content-header">
      <h1>
        Cost Center
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($costCentre) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Cost Center Code']);
            echo $this->Form->input('name',['label' => 'Cost Center Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('effective_start_date', ['label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('parent_cost_center');
            echo $this->Form->input('cost_center_manager');
        ?>
    </fieldset>
    <div class="box-footer">
    <?= $this->Form->button(__('Submit'),['title' => 'Save Cost Center', 'class' => 'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
