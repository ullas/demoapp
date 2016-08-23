<section class="content-header">
  <h1>
    Contact Info
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'ContactInfos', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('mobile') ?></th>
                <th><?= $this->Paginator->sort('email_address1') ?></th>
                <th><?= $this->Paginator->sort('email_address2') ?></th>
                <th><?= $this->Paginator->sort('facebook') ?></th>
                <th><?= $this->Paginator->sort('linkedin') ?></th>
                <th><?= $this->Paginator->sort('person_id_external') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactInfos as $contactInfo): ?>
            <tr>
                <td><?= $this->Number->format($contactInfo->id) ?></td>
                <td><?= h($contactInfo->phone) ?></td>
                <td><?= h($contactInfo->mobile) ?></td>
                <td><?= h($contactInfo->email_address1) ?></td>
                <td><?= h($contactInfo->email_address2) ?></td>
                <td><?= h($contactInfo->facebook) ?></td>
                <td><?= h($contactInfo->linkedin) ?></td>
                <td><?= h($contactInfo->person_id_external) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contactInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactInfo->id)]) ?>
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
