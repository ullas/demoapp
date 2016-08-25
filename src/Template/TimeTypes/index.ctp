<section class="content-header">
  <h1>
    Time Type
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'TimeTypes', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('classification') ?></th>
                <th><?= $this->Paginator->sort('unit') ?></th>
                <th><?= $this->Paginator->sort('perm_fractions_days') ?></th>
                <th><?= $this->Paginator->sort('workflow') ?></th>
                <th><?= $this->Paginator->sort('perm_fractions_hours') ?></th>
                <th><?= $this->Paginator->sort('calc_base') ?></th>
                <th><?= $this->Paginator->sort('flex_req_allow') ?></th>
                <th><?= $this->Paginator->sort('time_acc_type') ?></th>
                <th><?= $this->Paginator->sort('take_rule') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timeTypes as $timeType): ?>
            <tr>
                <td><?= $this->Number->format($timeType->id) ?></td>
                <td><?= h($timeType->country) ?></td>
                <td><?= h($timeType->classification) ?></td>
                <td><?= $this->Number->format($timeType->unit) ?></td>
                <td><?= $this->Number->format($timeType->perm_fractions_days) ?></td>
                <td><?= h($timeType->workflow) ?></td>
                <td><?= $this->Number->format($timeType->perm_fractions_hours) ?></td>
                <td><?= h($timeType->calc_base) ?></td>
                <td><?= h($timeType->flex_req_allow) ?></td>
                <td><?= h($timeType->time_acc_type) ?></td>
                <td><?= h($timeType->take_rule) ?></td>
                <td><?= h($timeType->code) ?></td>
                <td><?= h($timeType->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timeType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeType->id)]) ?>
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
