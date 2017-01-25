<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Pay Range
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
    <?= $this->Form->create($payRange, array('role' => 'form')) ?>
    <?php
            echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('status',['disabled' => true]);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'disabled' => true]);
            echo $this->Form->input('frequency_code',['disabled' => true]);
            echo $this->Form->input('minimum_pay',['disabled' => true]);
            echo $this->Form->input('maximum_pay',['disabled' => true]);
            echo $this->Form->input('increment',['disabled' => true]);
            echo $this->Form->input('incr_percentage',['disabled' => true]);
            echo $this->Form->input('mid_point',['disabled' => true]);
            echo $this->Form->input('geo_zone',['disabled' => true]);
            echo $this->Form->input('external_code',['disabled' => true]);
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'disabled' => true]);
            echo $this->Form->input('pay_group_id', ['options' => $payGroups, 'disabled' => true]);
        ?></div>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit PayRange'), ['action' => 'edit', $payRange['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></section>
