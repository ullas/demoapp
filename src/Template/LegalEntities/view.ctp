<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Legal Entity
        <small>View</small>
      </h1>
      <ol class="breadcrumb">

        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
        <?= $this->Form->create($legalEntity, array('role' => 'form')) ?>
        <fieldset>
          <?php
            echo $this->Form->input('external_code',['label'=>['text'=>'Legal Entity Code','class'=>'mandatory'],'disabled' => true]);
            echo $this->Form->input('name',['label'=>['text'=>'Legal Entity Name','class'=>'mandatory'],'disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('effective_start_date', ['value' => !empty($legalEntity->effective_start_date) ? $legalEntity->effective_start_date->format($mptldateformat) : '','label' =>'Effective as of','class' => 'mptldp','type' => 'text','disabled' => true]);
            echo $this->Form->input('effective_end_date', ['value' => !empty($legalEntity->effective_end_date) ? $legalEntity->effective_end_date->format($mptldateformat) : '','label' =>'End Date','class' => 'mptldp','type' => 'text','disabled' => true]);
            echo $this->Form->input('country_of_registration',['label' =>'Country','class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('standard_weekly_hours',['disabled' => true]);
            echo $this->Form->input('currency',['class'=>'select2','options' => $this->Currency->get_currencies(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('official_language',['class'=>'select2','options' => $this->Language->get_languages(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('location_id', ['label' => 'Default Location','class'=>'select2','options' => $locations, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('paygroup_id', ['label' => 'Default Pay Group','class'=>'select2','label'=>['text'=>'Pay Group'],'options' => $payGroups, 'empty' => true,'disabled' => true]);
			      echo $this->Form->input('holiday_calendar_id', ['label' => 'Default Holiday Calendar','class'=>'select2', 'empty' => true,'disabled' => true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit LegalEntity'), ['action' => 'edit', $legalEntity['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
