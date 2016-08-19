<section class="content-header">
  <h1>
    Business Unit
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-default"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('head_of_unit') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessUnits as $businessUnit): ?>
            <tr>
                <td><?= $this->Number->format($businessUnit->id) ?></td>
                <td><?= h($businessUnit->name) ?></td>
                <td><?= h($businessUnit->description) ?></td>
                <td><?= h($businessUnit->effective_status) ?></td>
                <td><?= h($businessUnit->effective_start_date) ?></td>
                <td><?= h($businessUnit->effective_end_date) ?></td>
                <td><?= h($businessUnit->external_code) ?></td>
                <td><?= $this->Number->format($businessUnit->head_of_unit) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessUnit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessUnit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessUnit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessUnit->id)]) ?>
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