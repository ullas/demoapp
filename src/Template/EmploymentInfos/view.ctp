<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employment Info'), ['action' => 'edit', $employmentInfo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employment Info'), ['action' => 'delete', $employmentInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employmentInfo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employment Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employment Info'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employmentInfos view large-9 medium-8 columns content">
    <h3><?= h($employmentInfo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= h($employmentInfo->company) ?></td>
        </tr>
        <tr>
            <th><?= __('Prev Employeeid') ?></th>
            <td><?= h($employmentInfo->prev_employeeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Credit') ?></th>
            <td><?= h($employmentInfo->job_credit) ?></td>
        </tr>
        <tr>
            <th><?= __('Notes') ?></th>
            <td><?= h($employmentInfo->notes) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $employmentInfo->has('customer') ? $this->Html->link($employmentInfo->customer->name, ['controller' => 'Customers', 'action' => 'view', $employmentInfo->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($employmentInfo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Initial Stock Grant') ?></th>
            <td><?= $this->Number->format($employmentInfo->initial_stock_grant) ?></td>
        </tr>
        <tr>
            <th><?= __('Initial Option Grant') ?></th>
            <td><?= $this->Number->format($employmentInfo->initial_option_grant) ?></td>
        </tr>
        <tr>
            <th><?= __('Employee Id') ?></th>
            <td><?= $this->Number->format($employmentInfo->employee_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($employmentInfo->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('First Date Worked') ?></th>
            <td><?= h($employmentInfo->first_date_worked) ?></td>
        </tr>
        <tr>
            <th><?= __('Original Start Date') ?></th>
            <td><?= h($employmentInfo->original_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Seniority Date') ?></th>
            <td><?= h($employmentInfo->seniority_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Benefits Eligibility Start Date') ?></th>
            <td><?= h($employmentInfo->benefits_eligibility_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Service Date') ?></th>
            <td><?= h($employmentInfo->service_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($employmentInfo->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Roll End Date') ?></th>
            <td><?= h($employmentInfo->pay_roll_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Date Worked') ?></th>
            <td><?= h($employmentInfo->last_date_worked) ?></td>
        </tr>
        <tr>
            <th><?= __('Bonus Pay Expiration Date') ?></th>
            <td><?= h($employmentInfo->bonus_pay_expiration_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Stock End Date') ?></th>
            <td><?= h($employmentInfo->stock_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Salary End Date') ?></th>
            <td><?= h($employmentInfo->salary_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Benefits End Date') ?></th>
            <td><?= h($employmentInfo->benefits_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Primary') ?></th>
            <td><?= $employmentInfo->is_primary ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Eligible For Stock') ?></th>
            <td><?= $employmentInfo->eligible_for_stock ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Contingent Worker') ?></th>
            <td><?= $employmentInfo->is_contingent_worker ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Ok To Rehire') ?></th>
            <td><?= $employmentInfo->ok_to_rehire ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Regret Termination') ?></th>
            <td><?= $employmentInfo->regret_termination ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Eligible For Sal Continuation') ?></th>
            <td><?= $employmentInfo->eligible_for_sal_continuation ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
