<?= $this->element('templateelmnt'); ?>

<section class="content-header">
  <h1>
    Business Unit
    <small>Edit</small>
  </h1>
  <ol class="breadcrumb">
    <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($businessUnit, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
          	  echo $this->Form->input('external_code',['label'=>['text'=>'Business Unit Code','class'=>'mandatory']]);
              echo $this->Form->input('name',['label'=>['text'=>'Business Unit Name','class'=>'mandatory']]);
              echo $this->Form->input('description');
              echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
              echo $this->Form->input('effective_start_date', ['label' =>'Start Date','class' => 'mptldp','value' => !empty($businessUnit->effective_start_date) ? $businessUnit->effective_start_date->format($mptldateformat) : '','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('effective_end_date', ['label' =>'End Date','class' => 'mptldp','value' => !empty($businessUnit->effective_end_date) ? $businessUnit->effective_end_date->format($mptldateformat) : '','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('head_of_unit',['label' =>'Head of Unit','class'=>'select2','options' => $employees, 'empty' => true]);
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?= $this->Form->button(__('Save Business Unit'),['class'=>'pull-right']) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>
