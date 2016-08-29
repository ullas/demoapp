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
            echo $this->Form->input('unit');
            echo $this->Form->input('perm_reccur');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('valid_from', ['empty' => true]);
            echo $this->Form->input('valid_from_day', ['empty' => true]);
            echo $this->Form->input('account_booking_off');
            echo $this->Form->input('freq_period');
            echo $this->Form->input('first_offset');
            echo $this->Form->input('start_accrual');
            echo $this->Form->input('accrual_base');
            echo $this->Form->input('min_balance');
            echo $this->Form->input('posting_order');
            echo $this->Form->input('time_to_accrual');
            echo $this->Form->input('proration_used');
            echo $this->Form->input('rounding_used');
            echo $this->Form->input('update_rule');
            echo $this->Form->input('payout_eligiblity');
            echo $this->Form->input('code');
            echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'empty' => true]);
            echo $this->Form->input('time_to_actual_unit');
            echo $this->Form->input('pay_component_group_id', ['options' => $payComponentGroups, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
