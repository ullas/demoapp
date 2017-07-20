<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Pay Range
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payRange) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Pay Range Code']);
            echo $this->Form->input('name',['label' => 'Pay Range Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status',['class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('start_date',['class' => 'mptldp','value' => !empty($payRange->start_date) ? $payRange->start_date->format($mptldateformat) : '','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','value' => !empty($payRange->end_date) ? $payRange->end_date->format($mptldateformat) : '','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('frequency_code',['label' => 'Frequency']);
            echo $this->Form->input('minimum_pay');
            echo $this->Form->input('maximum_pay');
            echo $this->Form->input('increment');
            echo $this->Form->input('incr_percentage',['label' => 'Increment Percentage']);
            echo $this->Form->input('mid_point');
            echo $this->Form->input('geo_zone');
            echo $this->Form->input('legal_entity_id', ['label' => 'Legal Entity','options' => $legalEntities, 'empty' => true]);
            echo $this->Form->input('pay_group_id', ['label' => 'Pay Group','options' => $payGroups, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Pay Range'),['title'=>'Update Pay Range','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>



