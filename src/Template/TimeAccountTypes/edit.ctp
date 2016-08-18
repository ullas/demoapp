<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timeAccountType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timeAccountType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Time Account Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timeAccountTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($timeAccountType) ?>
    <fieldset>
        <legend><?= __('Edit Time Account Type') ?></legend>
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
            echo $this->Form->input('time_to_accrual_unit');
            echo $this->Form->input('proration_used');
            echo $this->Form->input('rounding_used');
            echo $this->Form->input('update_rule');
            echo $this->Form->input('payout_eligiblity');
            echo $this->Form->input('pay_comp_group');
            echo $this->Form->input('pay_comp');
            echo $this->Form->input('code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
