<section class="content-header">
  <h1>
    Pay Component Group
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Departments', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('currency') ?></th>
                <th><?= $this->Paginator->sort('show_on_comp_ui') ?></th>
                <th><?= $this->Paginator->sort('use_for_comparatio_calc') ?></th>
                <th><?= $this->Paginator->sort('use_for_range_penetration') ?></th>
                <th><?= $this->Paginator->sort('sort_order') ?></th>
                <th><?= $this->Paginator->sort('system_defined') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payComponentGroups as $payComponentGroup): ?>
            <tr>
                <td><?= $this->Number->format($payComponentGroup->id) ?></td>
                <td><?= h($payComponentGroup->name) ?></td>
                <td><?= h($payComponentGroup->description) ?></td>
                <td><?= h($payComponentGroup->status) ?></td>
                <td><?= h($payComponentGroup->start_date) ?></td>
                <td><?= h($payComponentGroup->end_date) ?></td>
                <td><?= h($payComponentGroup->currency) ?></td>
                <td><?= h($payComponentGroup->show_on_comp_ui) ?></td>
                <td><?= h($payComponentGroup->use_for_comparatio_calc) ?></td>
                <td><?= h($payComponentGroup->use_for_range_penetration) ?></td>
                <td><?= $this->Number->format($payComponentGroup->sort_order) ?></td>
                <td><?= h($payComponentGroup->system_defined) ?></td>
                <td><?= h($payComponentGroup->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payComponentGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payComponentGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payComponentGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payComponentGroup->id)]) ?>
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
