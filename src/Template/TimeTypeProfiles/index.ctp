<section class="content-header">
  <h1>
    Time Type Profile
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'TimeTypeProfiles', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('time_rec_variant') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('enable_ess') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('time_type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timeTypeProfiles as $timeTypeProfile): ?>
            <tr>
                <td><?= $this->Number->format($timeTypeProfile->id) ?></td>
                <td><?= h($timeTypeProfile->code) ?></td>
                <td><?= h($timeTypeProfile->name) ?></td>
                <td><?= h($timeTypeProfile->country) ?></td>
                <td><?= h($timeTypeProfile->start_date) ?></td>
                <td><?= h($timeTypeProfile->time_rec_variant) ?></td>
                <td><?= h($timeTypeProfile->status) ?></td>
                <td><?= h($timeTypeProfile->enable_ess) ?></td>
                <td><?= h($timeTypeProfile->external_code) ?></td>
                <td><?= $timeTypeProfile->has('time_type') ? $this->Html->link($timeTypeProfile->time_type->name, ['controller' => 'TimeTypes', 'action' => 'view', $timeTypeProfile->time_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timeTypeProfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeTypeProfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeTypeProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTypeProfile->id)]) ?>
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
