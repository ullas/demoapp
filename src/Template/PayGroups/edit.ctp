<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pay Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($payGroup) ?>
    <fieldset>
        <legend><?= __('Edit Pay Group') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo $this->Form->input('earliest_change_date', ['empty' => true]);
            echo $this->Form->input('payment_frequency');
            echo $this->Form->input('primary_contactid');
            echo $this->Form->input('primary_contact_email');
            echo $this->Form->input('primary_contact_name');
            echo $this->Form->input('secondary_contactid');
            echo $this->Form->input('secondary_contact_email');
            echo $this->Form->input('secondary_contact_name');
            echo $this->Form->input('weeks_in_pay_period');
            echo $this->Form->input('data_delimiter');
            echo $this->Form->input('decimal_point');
            echo $this->Form->input('lag');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
