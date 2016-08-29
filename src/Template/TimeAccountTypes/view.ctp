<section class="content-header">
  <h1>
    Time Account Type
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table class="table table-hover">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timeAccountType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= h($timeAccountType->unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Reccur') ?></th>
            <td><?= h($timeAccountType->perm_reccur) ?></td>
        </tr>
        <tr>
            <th><?= __('Freq Period') ?></th>
            <td><?= h($timeAccountType->freq_period) ?></td>
        </tr>
        <tr>
            <th><?= __('Accrual Base') ?></th>
            <td><?= h($timeAccountType->accrual_base) ?></td>
        </tr>
        <tr>
            <th><?= __('Posting Order') ?></th>
            <td><?= h($timeAccountType->posting_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Update Rule') ?></th>
            <td><?= h($timeAccountType->update_rule) ?></td>
        </tr>
        <tr>
            <th><?= __('Payout Eligiblity') ?></th>
            <td><?= h($timeAccountType->payout_eligiblity) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($timeAccountType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Component') ?></th>
            <td><?= $timeAccountType->has('pay_component') ? $this->Html->link($timeAccountType->pay_component->name, ['controller' => 'PayComponents', 'action' => 'view', $timeAccountType->pay_component->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Time To Actual Unit') ?></th>
            <td><?= h($timeAccountType->time_to_actual_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Component Group') ?></th>
            <td><?= $timeAccountType->has('pay_component_group') ? $this->Html->link($timeAccountType->pay_component_group->name, ['controller' => 'PayComponentGroups', 'action' => 'view', $timeAccountType->pay_component_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeAccountType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Account Booking Off') ?></th>
            <td><?= $this->Number->format($timeAccountType->account_booking_off) ?></td>
        </tr>
        <tr>
            <th><?= __('First Offset') ?></th>
            <td><?= $this->Number->format($timeAccountType->first_offset) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Accrual') ?></th>
            <td><?= $this->Number->format($timeAccountType->start_accrual) ?></td>
        </tr>
        <tr>
            <th><?= __('Min Balance') ?></th>
            <td><?= $this->Number->format($timeAccountType->min_balance) ?></td>
        </tr>
        <tr>
            <th><?= __('Time To Accrual') ?></th>
            <td><?= $this->Number->format($timeAccountType->time_to_accrual) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($timeAccountType->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From') ?></th>
            <td><?= h($timeAccountType->valid_from) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From Day') ?></th>
            <td><?= h($timeAccountType->valid_from_day) ?></td>
        </tr>
        <tr>
            <th><?= __('Proration Used') ?></th>
            <td><?= $timeAccountType->proration_used ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Rounding Used') ?></th>
            <td><?= $timeAccountType->rounding_used ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
