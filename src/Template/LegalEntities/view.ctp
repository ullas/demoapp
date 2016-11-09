<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Legal Entity
        <small>View</small>
      </h1>
      <ol class="breadcrumb">
        
        <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
        <?= $this->Form->create($legalEntity, array('role' => 'form')) ?>
        <fieldset>
          <?php
            echo $this->Form->input('name',['label'=>['text'=>'Name','class'=>'mandatory'],'disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('effective_status',['disabled' => true]);
            echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','disabled' => true]);
            echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','disabled' => true]);
            echo $this->Form->input('country_of_registration',['class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('standard_weekly_hours',['disabled' => true]);
            echo $this->Form->input('currency',['class'=>'select2','options' => $this->Currency->get_currencies(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('official_language',['class'=>'select2','options' => $this->Language->get_languages(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory'],'disabled' => true]);
            echo $this->Form->input('location_id', ['class'=>'select2','options' => $locations, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('paygroup_id', ['class'=>'select2','label'=>['text'=>'Pay Group'],'options' => $payGroups, 'empty' => true,'disabled' => true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit LegalEntity'), ['action' => 'edit', $legalEntity['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
