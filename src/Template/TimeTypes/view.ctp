<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Leave Type
        <small>View</small>
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
        	  echo $this->Form->input('code',['label' => 'Time Type Code','disabled' => true]);
			      echo $this->Form->input('name',['label' => 'Time Type Name','disabled' => true]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('classification',['disabled' => true]);
            echo $this->Form->input('unit',['class'=>'select2','options' => array('Hour(s)', 'Day(s)'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('perm_fractions_hours',['disabled' => true,'label'=>'Permitted Fractions for Unit Hours']);
            echo $this->Form->input('perm_fractions_days',['disabled' => true,'class'=>'select2','options' => ['1' => 'Quarter of a Day', '2' => 'Half a Day','3'=>'3 Quarters of a Day','4'=>'Full Day'],'empty'=>'Choose','label'=>'Permitted Fractions for Unit Days']);
            echo $this->Form->input('calc_base',['label' => 'Calculation Based On','disabled' => true]);
            echo $this->Form->input('time_account_type_id', ['options' => $timeAccountTypes, 'empty' => true,'disabled' => true]);
			      echo $this->Form->input('flex_req_allow',['label'=>'Flexible Requesting Allowed','disabled' => true]);
			      echo $this->Form->input('workflowrule_id',['label'=>'Workflow','class'=>'select2', 'empty' => 'Choose', 'disabled' => true]);
        ?>
    </fieldset>

    <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit LeaveType'), ['action' => 'edit', $timeType['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>
