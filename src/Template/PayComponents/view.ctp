<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay Component'), ['action' => 'edit', $payComponent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay Component'), ['action' => 'delete', $payComponent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payComponent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pay Components'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Component'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payComponents view large-9 medium-8 columns content">
    <h3><?= h($payComponent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($payComponent->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payComponent->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Component Type') ?></th>
            <td><?= h($payComponent->pay_component_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Earning') ?></th>
            <td><?= h($payComponent->is_earning) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= h($payComponent->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Pay Component Group') ?></th>
            <td><?= h($payComponent->base_pay_component_group) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Treatment') ?></th>
            <td><?= h($payComponent->tax_treatment) ?></td>
        </tr>
        <tr>
            <th><?= __('Can Override') ?></th>
            <td><?= h($payComponent->can_override) ?></td>
        </tr>
        <tr>
            <th><?= __('Self Service Description') ?></th>
            <td><?= h($payComponent->self_service_description) ?></td>
        </tr>
        <tr>
            <th><?= __('Display On Self Service') ?></th>
            <td><?= h($payComponent->display_on_self_service) ?></td>
        </tr>
        <tr>
            <th><?= __('Used For Comp Planning') ?></th>
            <td><?= h($payComponent->used_for_comp_planning) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit Of Measure') ?></th>
            <td><?= h($payComponent->unit_of_measure) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payComponent->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Frequency') ?></th>
            <td><?= $payComponent->has('frequency') ? $this->Html->link($payComponent->frequency->name, ['controller' => 'Frequencies', 'action' => 'view', $payComponent->frequency->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payComponent->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Component Value') ?></th>
            <td><?= $this->Number->format($payComponent->pay_component_value) ?></td>
        </tr>
        <tr>
            <th><?= __('Max Fraction Digits') ?></th>
            <td><?= $this->Number->format($payComponent->max_fraction_digits) ?></td>
        </tr>
        <tr>
            <th><?= __('Rate') ?></th>
            <td><?= $this->Number->format($payComponent->rate) ?></td>
        </tr>
        <tr>
            <th><?= __('Number') ?></th>
            <td><?= $this->Number->format($payComponent->number) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($payComponent->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($payComponent->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $payComponent->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Recurring') ?></th>
            <td><?= $payComponent->recurring ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Target') ?></th>
            <td><?= $payComponent->target ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Relevant For Advance Payment') ?></th>
            <td><?= $payComponent->is_relevant_for_advance_payment ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
