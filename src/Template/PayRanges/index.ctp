<section class="content-header">
  <h1>
    Pay Range
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'PayRanges', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('currency') ?></th>
                <th><?= $this->Paginator->sort('frequency_code') ?></th>
                <th><?= $this->Paginator->sort('minimum_pay') ?></th>
                <th><?= $this->Paginator->sort('maximum_pay') ?></th>
                <th><?= $this->Paginator->sort('increment') ?></th>
                <th><?= $this->Paginator->sort('incr_percentage') ?></th>
                <th><?= $this->Paginator->sort('mid_point') ?></th>
                <th><?= $this->Paginator->sort('geo_zone') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('legal_entity_id') ?></th>
                <th><?= $this->Paginator->sort('pay_group_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payRanges as $payRange): ?>
            <tr>
                <td><?= h($payRange->name) ?></td>
                <td><?= h($payRange->description) ?></td>
                <td><?= h($payRange->status) ?></td>
                <td><?= h($payRange->start_date) ?></td>
                <td><?= h($payRange->end_date) ?></td>
                <td><?= h($payRange->currency) ?></td>
                <td><?= h($payRange->frequency_code) ?></td>
                <td><?= $this->Number->format($payRange->minimum_pay) ?></td>
                <td><?= $this->Number->format($payRange->maximum_pay) ?></td>
                <td><?= $this->Number->format($payRange->increment) ?></td>
                <td><?= $this->Number->format($payRange->incr_percentage) ?></td>
                <td><?= $this->Number->format($payRange->mid_point) ?></td>
                <td><?= h($payRange->geo_zone) ?></td>
                <td><?= $this->Number->format($payRange->id) ?></td>
                <td><?= h($payRange->external_code) ?></td>
                <td><?= $payRange->has('legal_entity') ? $this->Html->link($payRange->legal_entity->name, ['controller' => 'LegalEntities', 'action' => 'view', $payRange->legal_entity->id]) : '' ?></td>
                <td><?= $payRange->has('pay_group') ? $this->Html->link($payRange->pay_group->name, ['controller' => 'PayGroups', 'action' => 'view', $payRange->pay_group->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payRange->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payRange->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payRange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payRange->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div></div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>