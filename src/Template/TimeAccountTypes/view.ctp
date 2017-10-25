<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Time Account Type
        <small>View</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($timeAccountType) ?>
    <fieldset>
        <?php
            echo $this->Form->input('code',['label' => 'Time Account Code','disabled' => true]);
            echo $this->Form->input('name',['label' => 'Time Account Name','disabled' => true]);
            echo $this->Form->input('unit',['label'=>'Unit','class'=>'select2','options' => array('Hour(s)', 'Day(s)'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('perm_reccur',['label'=>'Permanent / Recurring','disabled' => true,'class'=>'select2','options' => array('Permanent', 'Recurring'), 'empty' => true]);
            echo $this->Form->input('start_date',['label'=>'Account Creation Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('valid_from',['label'=>'Account Valid From (month)','class'=>'select2','options' => array("January","February","March","April","May","June","July","August","September","October","November","December"), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('valid_from_day',['label'=>'Account Valid From (day)','disabled' => true]);
            echo $this->Form->input('account_booking_off',['label'=>'Account Booking Offset (Months)','disabled' => true]);
            echo $this->Form->input('freq_period',['label'=>'Frequency Period','class'=>'select2','options' => array('Weekly','bi Weekly','Monthly','Annually'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('first_offset',['label'=>'First Accrual Offset (Days)','disabled' => true]);
            echo $this->Form->input('start_accrual',['label'=>'Start of Accrual Period','value' => !empty($timeAccountType->start_accrual) ? $timeAccountType->start_accrual->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('accrual_base',['label'=>'Accruals Based On','disabled' => true]);
            echo $this->Form->input('min_balance',['label'=>'Balance Cannot Fall Below','disabled' => true]);
            echo $this->Form->input('posting_order',['class'=>'select2','options' => array('Oldest First' , 'Newest First'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('time_to_accrual',['label'=>'Time From Hire to First Accrual','disabled' => true]);
			echo $this->Form->input('time_to_accrual_unit' ,['label'=>'Time Unit From Hire to First Accrual','class'=>'select2','options' => array('Days' , 'Weeks ', 'Months', 'Years'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('proration_used',['label'=>'Are Prorations Used for New Hire Accruals','disabled' => true]);
            echo $this->Form->input('rounding_used',['label'=>'Are Rounding Values Included for New Hires','disabled' => true]);
            echo $this->Form->input('update_rule',['label'=>'Period End Processing/Interim Update Rule','disabled' => true]);
            echo $this->Form->input('payout_eligiblity',['class'=>'select2','options' => array('Yes' , 'No'), 'empty' => 'Choose', 'disabled' => true]);
            echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('pay_component_group_id', ['options' => $payComponentGroups, 'empty' => true,'disabled' => true]);
            // echo $this->Form->input('iscarryforward',['label'=>'Is Carry Forward','disabled' => true]);
            echo $this->Form->input('isleavewithoutpay',['label'=>'Is Leave Without Pay','disabled' => true]);
            echo $this->Form->input('allownegativebalance',['label'=>'Allow Negative Balance','disabled' => true]);
            echo $this->Form->input('includeholidayswithinleaveasleaves',['label'=>'Include Holidays within leave as leaves','disabled' => true]);

        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?=$this->Html->link(__('Edit'), ['action' => 'edit', $timeAccountType['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>
