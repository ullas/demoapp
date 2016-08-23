<section class="content-header">
  <h1>
    Frequency
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Frequencies', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('annualization_factor') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frequencies as $frequency): ?>
            <tr>
                <td><?= $this->Number->format($frequency->id) ?></td>
                <td><?= h($frequency->name) ?></td>
                <td><?= h($frequency->description) ?></td>
                <td><?= $this->Number->format($frequency->annualization_factor) ?></td>
                <td><?= h($frequency->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $frequency->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $frequency->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $frequency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frequency->id)]) ?>
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
