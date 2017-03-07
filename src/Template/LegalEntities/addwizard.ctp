<?= $this->element('templateelmnt'); ?>

<section class="content" style="padding: 1px;min-height:150px;">
	<?= $this->element('stepformwizardelmnt', array('wcontent' => 'LegalEntity','wid' => '1')); ?>
</section>
    <section class="content-header">
      <h1>
        Legal Entity
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($legalEntity) ?>
    <fieldset>
			<?php
				echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory']]);
            	echo $this->Form->input('name',['label'=>['text'=>'Name','class'=>'mandatory']]);
            	echo $this->Form->input('description');
            	echo $this->Form->input('effective_status');
            	echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text']);
            	echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text']);
            	echo $this->Form->input('country_of_registration',['class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            	echo $this->Form->input('standard_weekly_hours');
            	echo $this->Form->input('currency',['class'=>'select2','options' => $this->Currency->get_currencies(), 'empty' => true]);
            	echo $this->Form->input('official_language',['class'=>'select2','options' => $this->Language->get_languages(), 'empty' => true]);
            	echo $this->Form->input('location_id', ['class'=>'select2','options' => $locations, 'empty' => true]);
            	echo $this->Form->input('paygroup_id', ['class'=>'select2','label'=>['text'=>'Pay Group'],'options' => $payGroups, 'empty' => true]);
				echo $this->Form->input('holiday_calendar_id', ['class'=>'select2', 'empty' => true]);
			?>
    	</fieldset>
	<div class="box-footer">
    	<?= $this->Form->button(__('Save Legal Entity'),['title'=>'Save Legal Entity','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>

