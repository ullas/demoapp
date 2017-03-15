<?= $this->element('templateelmnt'); ?>

<section class="content" style="padding: 1px;min-height:150px;">
	<?= $this->element('stepformwizardelmnt', array('wcontent' => 'Division','wid' => '3')); ?>
</section>

<section class="content-header">
      <h1>
        Division
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($division) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Division Code']);
            echo $this->Form->input('name',['label' => 'Division Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status']);
            echo $this->Form->input('effective_start_date', ['label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('parent_division');
            echo $this->Form->input('head_of_unit',['label' => 'Head of Division']);
        ?>
    </fieldset>
    <div class="box-footer">
       <?= $this->Form->button(__('Submit'),['class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
