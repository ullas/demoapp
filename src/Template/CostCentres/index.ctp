<section class="content-header">
  <h1>
    Cost Centre
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'CostCentres', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('parent_cost_center') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('cost_center_manager') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($costCentres as $costCentre): ?>
            <tr>
                <td><?= $this->Number->format($costCentre->id) ?></td>
                <td><?= h($costCentre->name) ?></td>
                <td><?= h($costCentre->description) ?></td>
                <td><?= h($costCentre->effective_status) ?></td>
                <td><?= h($costCentre->effective_start_date) ?></td>
                <td><?= h($costCentre->effective_end_date) ?></td>
                <td><?= h($costCentre->parent_cost_center) ?></td>
                <td><?= h($costCentre->external_code) ?></td>
                <td><?= $this->Number->format($costCentre->cost_center_manager) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $costCentre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $costCentre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $costCentre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costCentre->id)]) ?>
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
