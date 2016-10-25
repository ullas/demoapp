<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employment Infos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employmentInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($employmentInfo) ?>
    <fieldset>
        <legend><?= __('Add Employment Info') ?></legend>
        <?php
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('first_date_worked', ['empty' => true]);
            echo $this->Form->input('original_start_date', ['empty' => true]);
            echo $this->Form->input('company');
            echo $this->Form->input('is_primary');
            echo $this->Form->input('seniority_date', ['empty' => true]);
            echo $this->Form->input('benefits_eligibility_start_date', ['empty' => true]);
            echo $this->Form->input('prev_employeeid');
            echo $this->Form->input('eligible_for_stock');
            echo $this->Form->input('service_date', ['empty' => true]);
            echo $this->Form->input('initial_stock_grant');
            echo $this->Form->input('initial_option_grant');
            echo $this->Form->input('job_credit');
            echo $this->Form->input('notes');
            echo $this->Form->input('is_contingent_worker');
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('ok_to_rehire');
            echo $this->Form->input('pay_roll_end_date', ['empty' => true]);
            echo $this->Form->input('last_date_worked', ['empty' => true]);
            echo $this->Form->input('regret_termination');
            echo $this->Form->input('eligible_for_sal_continuation');
            echo $this->Form->input('bonus_pay_expiration_date', ['empty' => true]);
            echo $this->Form->input('stock_end_date', ['empty' => true]);
            echo $this->Form->input('salary_end_date', ['empty' => true]);
            echo $this->Form->input('benefits_end_date', ['empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('employee_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
