<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Cost Center
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
            echo $this->Form->input('external_code',['label' => 'Cost Center Code','disabled' => true]);
            echo $this->Form->input('name',['label' => 'Cost Center Name','disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('effective_start_date', ['label' => 'Start Date','value' => !empty($costCentre->effective_start_date) ? $costCentre->effective_start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('effective_end_date', ['label' => 'End Date','value' => !empty($costCentre->effective_end_date) ? $costCentre->effective_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('parent_id', ['label' => 'Parent Cost Center','class'=>'select2','options' => $parents, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('cost_center_manager', ['label' => 'Cost Center Manager','class'=>'select2','options' => $employees, 'empty' => true,'disabled' => true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Cost Center'), ['action' => 'edit', $costCentre['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
