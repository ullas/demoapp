<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Pay Component
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <div class="box box-primary"><div class="box-body">
      <?= $this->Form->create($payComponent, array('role' => 'form')) ?>
      <fieldset>
		<?php
    		echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('status',['disabled' => true,'class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
			echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('pay_component_type',['disabled' => true,'class'=>'select2','options' => array('Amount', 'Percentage'), 'empty' => 'Choose']);
            echo $this->Form->input('is_earning',['disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('pay_component_value',['disabled' => true]);
            echo $this->Form->input('recurring',['disabled' => true]);
            echo $this->Form->input('pay_component_group_id',['disabled' => true]);
            echo $this->Form->input('tax_treatment',['disabled' => true,'class'=>'select2','options' => array('No Tax', 'Regular','Gross Up'), 'empty' => 'Choose']);
            echo $this->Form->input('can_override',['disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('self_service_description',['disabled' => true]);
            echo $this->Form->input('display_on_self_service',['disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('used_for_comp_planning',['disabled' => true,'class'=>'select2','options' => array('None' ,'Comp ',' Varpay',' Both'), 'empty' => 'Choose']);
            echo $this->Form->input('target',['disabled' => true]);
            echo $this->Form->input('is_relevant_for_advance_payment',['disabled' => true]);
            echo $this->Form->input('max_fraction_digits',['disabled' => true]);
            echo $this->Form->input('unit_of_measure',['disabled' => true]);
            echo $this->Form->input('rate',['disabled' => true]);
            echo $this->Form->input('number',['disabled' => true]);
            echo $this->Form->input('external_code',['disabled' => true]);
            echo $this->Form->input('frequency_id', ['options' => $frequencies, 'empty' => true,'disabled' => true]);
			?>
	</fieldset>
        </div><div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit PayComponent'), ['action' => 'edit', $payComponent['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?></div></section>
