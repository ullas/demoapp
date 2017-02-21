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
        	echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('classification',['disabled' => true]);
            echo $this->Form->input('unit',['class'=>'select2','options' => array('Hour(s)', 'Day(s)'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('perm_fractions_hours',['disabled' => true]);
            echo $this->Form->input('perm_fractions_days',['class'=>'select2','options' => array('Quarter of a Day', 'Half a Day','3 Quarters of a Day','Full Day'),'empty'=>'Choose','disabled' => true]);
            echo $this->Form->input('calc_base',['disabled' => true]);
            echo $this->Form->input('code',['disabled' => true]);
			echo $this->Form->input('time_account_type_id', ['options' => $timeAccountTypes, 'empty' => true,'disabled' => true]);
			echo $this->Form->input('flex_req_allow',['disabled' => true]);
            echo $this->Form->input('iscarryforward',['label'=>'Is Carry Forward','disabled' => true]);
            echo $this->Form->input('isleavewithoutpay',['label'=>'Is Leave Without Pay','disabled' => true]);
            echo $this->Form->input('allow_negative_balance',['label'=>'Allow Negative Balance','disabled' => true]);
            echo $this->Form->input('includeholidayswithinleaveasleaves',['label'=>'Include Holidays within leave as leaves','disabled' => true]);
            
        ?>
    </fieldset>
    
    <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit LeaveType'), ['action' => 'edit', $timeType['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>
