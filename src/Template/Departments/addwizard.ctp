<?= $this->element('templateelmnt'); ?>

<section class="content" style="padding: 1px;min-height:150px;">
	<?= $this->element('stepformwizardelmnt', array('wcontent' => 'Department','wid' => '4')); ?>
</section>

    <section class="content-header">
      <h1>
        Department
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($department) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Department Code']);
            echo $this->Form->input('name',['label' => 'Department Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('effective_start_date', ['label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date',['label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('parent_id',['options' => $parents, 'empty' => true]);
            echo $this->Form->input('head_of_unit',['label' => 'Head of Department']);
            echo $this->Form->input('cost_center_id', ['options' => $costCentres, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'pull-right']) ?>
    <?= $this->Form->end() ?>
</div></div></section>
