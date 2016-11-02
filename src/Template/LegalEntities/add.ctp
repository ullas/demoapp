<style>
label.mandatory:after {
    content: ' *';
    color: #ff5a4d;
    display: inline;
}
[class^='select2'] {
  border-radius: 0px !important;
}
.select2-container--default .select2-selection--single{
  border:1px solid #D2D6DE;
}
</style>
<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Legal Entity
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
      </ol>
</section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($legalEntity) ?>
    <fieldset>
    	
        <?php
            echo $this->Form->input('name',['label'=>['text'=>'Name'],'templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('country_of_registration',['class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('standard_weekly_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('currency',['class'=>'select2','options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('official_language',['class'=>'select2','options' => $this->Language->get_languages(), 'empty' => true]);
            echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory']]);
            echo $this->Form->input('location_id', ['class'=>'select2','options' => $locations, 'empty' => true]);
            echo $this->Form->input('paygroup_id', ['class'=>'select2','label'=>['text'=>'Pay Group'],'options' => $payGroups, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Legal Entity'),['title'=>'Save Legal Entity','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
</section>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $(".select2").select2({ width: '100%' });
    $('#effective_start_date').datepicker({
      autoclose: true
    });
     $('#effective_end_date').datepicker({
      autoclose: true
    });
    // var sidebar_height = $(".sidebar").height();alert("sidebar:"+sidebar_height);
  });
</script>
<?php $this->end(); ?>
