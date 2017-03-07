<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Cost Centre
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(array('controller' => 'CostCentres', 'action' => 'index')); ?>"><i class="fa fa-mail-reply"></i> Back</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
        <?= $this->Form->create($costCentre, array('role' => 'form')) ?>
        <fieldset>
          <?php
            echo $this->Form->input('external_code',['disabled' => true]);
            echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('effective_status',['disabled' => true]);
            echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('parent_cost_center',['disabled' => true]);
            echo $this->Form->input('cost_center_manager',['disabled' => true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit CostCentre'), ['action' => 'edit', $costCentre['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
