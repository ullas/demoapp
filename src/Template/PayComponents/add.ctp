<?= $this->element('templateelmnt'); ?>

<section class="content-header">
      <h1>
       Pay Component
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payComponent) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Pay Component Code']);
            echo $this->Form->input('name',['label' => 'Pay Component Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status',['class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
			      echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pay_component_type',['class'=>'select2','options' => array('Amount', 'Percentage'), 'empty' => 'Choose']);
            echo $this->Form->input('is_earning',['class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('pay_component_value');
            echo $this->Form->input('frequency_id', ['label' => 'Frequency','options' => $frequencies, 'empty' => true]);
            echo $this->Form->input('recurring');
            echo $this->Form->input('pay_component_group_id',['label' => 'Base Pay Component Group','class'=>'select2', 'empty' => 'Choose']);
            echo $this->Form->input('tax_treatment',['class'=>'select2','options' => array('No Tax', 'Regular','Gross Up'), 'empty' => 'Choose']);
            echo $this->Form->input('can_override',['class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('self_service_description');
            echo $this->Form->input('display_on_self_service',['label' => 'Display on Self Service','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('used_for_comp_planning',['label' => 'Used for Comp Planning','class'=>'select2','options' => array('None' ,'Comp ',' Varpay',' Both'), 'empty' => 'Choose']);
            echo $this->Form->input('target');
            echo $this->Form->input('is_relevant_for_advance_payment',['label' => 'Relevant for Advance']);
            echo $this->Form->input('max_fraction_digits',['label' => 'Maximum Decimal Places']);
            echo $this->Form->input('unit_of_measure',['label' => 'Unit of Measure']);
            echo $this->Form->input('rate');
            echo $this->Form->input('number');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save PayComponent'),['title'=>'Save Pay Component','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
