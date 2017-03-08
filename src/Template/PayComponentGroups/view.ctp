<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Pay Component Group
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
    <?= $this->Form->create($payComponentGroup, array('role' => 'form')) ?>
    <fieldset><?php
            echo $this->Form->input('external_code',['disabled' => true]);
            echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('status',['disabled' => true,'class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('show_on_comp_ui',['label'=>'Display on Comp UI','disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_comparatio_calc',['label'=>'Use for Comparatio Calculation','disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_range_penetration',['disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('sort_order',['disabled' => true]);
            echo $this->Form->input('system_defined',['disabled' => true]);
            
        ?></fieldset>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit PayComponentGroup'), ['action' => 'edit', $payComponentGroup['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
