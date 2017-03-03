<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Leave Type
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($timeType) ?>
    <fieldset>
        <?php
        	echo $this->Form->input('name');
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('classification');
            echo $this->Form->input('unit',['class'=>'select2','options' => array('Hour(s)', 'Day(s)'), 'empty' => 'Choose']);
            echo $this->Form->input('perm_fractions_hours',['label'=>'Permitted Fractions for Unit Hours']);
            echo $this->Form->input('perm_fractions_days',['class'=>'select2','options' => array('Quarter of a Day', 'Half a Day','3 Quarters of a Day','Full Day'),'empty'=>'Choose','label'=>'Permitted Fractions for Unit Days']);
            echo $this->Form->input('calc_base');
            echo $this->Form->input('code');
			echo $this->Form->input('time_account_type_id', ['options' => $timeAccountTypes, 'empty' => true]);
			echo $this->Form->input('flex_req_allow');
            echo $this->Form->input('workflowrule_id',['class'=>'select2', 'empty' => 'Choose']);
            
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update LeaveType'),['title'=>'Update LeaveType','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>
