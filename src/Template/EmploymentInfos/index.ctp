<section class="content-header">
  <h1>
    Employment Info
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'EmploymentInfos', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('first_date_worked') ?></th>
                <th><?= $this->Paginator->sort('original_start_date') ?></th>
                <th><?= $this->Paginator->sort('company') ?></th>
                <th><?= $this->Paginator->sort('is_primary') ?></th>
                <th><?= $this->Paginator->sort('seniority_date') ?></th>
                <th><?= $this->Paginator->sort('benefits_eligibility_start_date') ?></th>
                <th><?= $this->Paginator->sort('prev_employeeid') ?></th>
                <th><?= $this->Paginator->sort('eligible_for_stock') ?></th>
                <th><?= $this->Paginator->sort('service_date') ?></th>
                <!-- <th><?= $this->Paginator->sort('initial_stock_grant') ?></th>
                <th><?= $this->Paginator->sort('initial_option_grant') ?></th>
                <th><?= $this->Paginator->sort('job_credit') ?></th>
                <th><?= $this->Paginator->sort('notes') ?></th>
                <th><?= $this->Paginator->sort('is_contingent_worker') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('ok_to_rehire') ?></th>
                <th><?= $this->Paginator->sort('pay_roll_end_date') ?></th>
                <th><?= $this->Paginator->sort('last_date_worked') ?></th>
                <th><?= $this->Paginator->sort('regret_termination') ?></th>
                <th><?= $this->Paginator->sort('eligible_for_sal_continuation') ?></th>
                <th><?= $this->Paginator->sort('bonus_pay_expiration_date') ?></th>
                <th><?= $this->Paginator->sort('stock_end_date') ?></th>
                <th><?= $this->Paginator->sort('salary_end_date') ?></th>
                <th><?= $this->Paginator->sort('benefits_end_date') ?></th> -->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employmentInfos as $employmentInfo): ?>
            <tr>
                <td><?= $this->Number->format($employmentInfo->id) ?></td>
                <td><?= h($employmentInfo->start_date) ?></td>
                <td><?= h($employmentInfo->first_date_worked) ?></td>
                <td><?= h($employmentInfo->original_start_date) ?></td>
                <td><?= h($employmentInfo->company) ?></td>
                <td><?= h($employmentInfo->is_primary) ?></td>
                <td><?= h($employmentInfo->seniority_date) ?></td>
                <td><?= h($employmentInfo->benefits_eligibility_start_date) ?></td>
                <td><?= h($employmentInfo->prev_employeeid) ?></td>
                <td><?= h($employmentInfo->eligible_for_stock) ?></td>
                <td><?= h($employmentInfo->service_date) ?></td>
                <!-- <td><?= $this->Number->format($employmentInfo->initial_stock_grant) ?></td>
                <td><?= $this->Number->format($employmentInfo->initial_option_grant) ?></td>
                <td><?= h($employmentInfo->job_credit) ?></td>
                <td><?= h($employmentInfo->notes) ?></td>
                <td><?= h($employmentInfo->is_contingent_worker) ?></td>
                <td><?= h($employmentInfo->end_date) ?></td>
                <td><?= h($employmentInfo->ok_to_rehire) ?></td>
                <td><?= h($employmentInfo->pay_roll_end_date) ?></td>
                <td><?= h($employmentInfo->last_date_worked) ?></td>
                <td><?= h($employmentInfo->regret_termination) ?></td>
                <td><?= h($employmentInfo->eligible_for_sal_continuation) ?></td>
                <td><?= h($employmentInfo->bonus_pay_expiration_date) ?></td>
                <td><?= h($employmentInfo->stock_end_date) ?></td>
                <td><?= h($employmentInfo->salary_end_date) ?></td>
                <td><?= h($employmentInfo->benefits_end_date) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employmentInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employmentInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employmentInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employmentInfo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table></div></div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
