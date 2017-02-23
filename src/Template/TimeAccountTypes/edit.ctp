<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Time Account Type
        <small>Edit</small>
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
            echo $this->Form->input('name');
            echo $this->Form->input('unit',['label'=>'Permitted Fractions for Unit Hours','class'=>'select2','options' => array('Hour(s)', 'Day(s)'), 'empty' => 'Choose']);
            echo $this->Form->input('perm_reccur',['label'=>'Permanent / Recurring']);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('valid_from',['label'=>'Account Valid From (month)','class'=>'select2','options' => array('1', '2','3','4','5','6','7','8','9','10','11','12'), 'empty' => 'Choose']);
            echo $this->Form->input('valid_from_day',['label'=>'Account Valid From (day)']);
            echo $this->Form->input('account_booking_off',['label'=>'Account Booking Offset (Months)']);
            echo $this->Form->input('freq_period',['label'=>'Frequency Period','class'=>'select2','options' => array('Weekly','bi Weekly','Monthly','Annually'), 'empty' => 'Choose']);
            echo $this->Form->input('first_offset',['label'=>'First Accrual Offset (Days)']);
            echo $this->Form->input('start_accrual',['label'=>'Start of accrual period']);
            echo $this->Form->input('accrual_base',['label'=>'Accruals Based On']);
            echo $this->Form->input('min_balance',['label'=>'Balance Cannot Fall Below']);
            echo $this->Form->input('posting_order',['class'=>'select2','options' => array('Oldest First' , 'Newest First'), 'empty' => 'Choose']);
            echo $this->Form->input('time_to_accrual',['label'=>'Time From Hire to First Accrual']);
			echo $this->Form->input('time_to_accrual_unit' ,['label'=>'Time Unit From Hire to First Accrual','class'=>'select2','options' => array('Days' , 'Weeks ', 'Months', 'Years'), 'empty' => 'Choose']);
            echo $this->Form->input('proration_used',['label'=>'Are Prorations used for New Hire Accruals']);
            echo $this->Form->input('rounding_used',['label'=>'Are rounding values included for New Hires']);
            echo $this->Form->input('update_rule',['label'=>'Period End Processing/Interim Update Rule']);
            echo $this->Form->input('payout_eligiblity');
            echo $this->Form->input('code');
            echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'empty' => true]);
            echo $this->Form->input('pay_component_group_id', ['options' => $payComponentGroups, 'empty' => true]);
            echo $this->Form->input('iscarryforward',['label'=>'Is Carry Forward']);
            echo $this->Form->input('isleavewithoutpay',['label'=>'Is Leave Without Pay']);
            echo $this->Form->input('allownegativebalance',['label'=>'Allow Negative Balance']);
            echo $this->Form->input('includeholidayswithinleaveasleaves',['label'=>'Include Holidays within leave as leaves']);
            
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update'),['title'=>'Update','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>