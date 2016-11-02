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
          echo $this->Form->input('name',['label'=>['text'=>'Name','class'=>'mandatory']]);
          echo $this->Form->input('description');
          echo $this->Form->input('effective_status');
          echo $this->Form->input('effective_start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
		  echo $this->Form->input('effective_end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
          echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory']]);
          echo $this->Form->input('head_of_unit');
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
<!-- Date picker -->
<?php
$this->Html->css([
    'AdminLTE./plugins/datepicker/datepicker3'
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datepicker/bootstrap-datepicker'
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $('#effective_start_date').datepicker({
      autoclose: true
    });
     $('#effective_end_date').datepicker({
      autoclose: true
    });
  });
</script>
<?php $this->end(); ?>
