<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Pay Group
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payGroup) ?>
    <fieldset>
        <?php
        echo $this->Form->input('external_code',['label' => 'Pay Group Code']);
        echo $this->Form->input('name',['label' => 'Pay Group Name']);
        echo $this->Form->input('description');
        
			echo $this->Form->input('legal_entity_id', ['class' => 'select2','options' => $legalEntities, 'empty' => true]);
            echo $this->Form->input('business_unit_id', ['class' => 'select2','options' => $businessUnits, 'empty' => true]);
            echo $this->Form->input('division_id', ['class' => 'select2','options' => $divisions, 'empty' => true]);
            echo $this->Form->input('location_id', ['class' => 'select2','options' => $locations, 'empty' => true]);
			
		echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
        echo $this->Form->input('effective_start_date',['value' => !empty($payGroup->effective_start_date) ? $payGroup->effective_start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
        echo $this->Form->input('effective_end_date',['value' => !empty($payGroup->effective_end_date) ? $payGroup->effective_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
        echo $this->Form->input('earliest_change_date',['value' => !empty($payGroup->earliest_change_date) ? $payGroup->earliest_change_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
        echo $this->Form->input('frequency_id', ['label' => 'Pay Frequency','options' => $frequencies, 'empty' => true,'label'=>'Pay Frequency']);
        echo $this->Form->input('primary_contactid',['label' => 'Primary Contact ID']);
        echo $this->Form->input('primary_contact_email',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-envelope"></i></div>']]);
        echo $this->Form->input('primary_contact_name');
        echo $this->Form->input('secondary_contactid',['label' => 'Secondary Contact ID']);
        echo $this->Form->input('secondary_contact_email',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-envelope"></i></div>']]);
        echo $this->Form->input('secondary_contact_name');
        echo $this->Form->input('weeks_in_pay_period',['label' => 'Weeks in Pay Period']);
        echo $this->Form->input('data_delimiter');
        echo $this->Form->input('decimal_point');
        echo $this->Form->input('lag');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Pay Group'),['title'=>'Save Pay Group','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
</div></section>
