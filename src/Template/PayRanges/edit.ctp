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
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('frequency_code');
            echo $this->Form->input('minimum_pay');
            echo $this->Form->input('maximum_pay');
            echo $this->Form->input('increment');
            echo $this->Form->input('incr_percentage');
            echo $this->Form->input('mid_point');
            echo $this->Form->input('geo_zone');
            echo $this->Form->input('external_code');
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'empty' => true]);
            echo $this->Form->input('pay_group_id', ['options' => $payGroups, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update PayRange'),['title'=>'Update PayRange','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>


