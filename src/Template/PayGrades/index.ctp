<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pay Grade'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payGrades index large-9 medium-8 columns content">
    <h3><?= __('Pay Grades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('pay_grade_level') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payGrades as $payGrade): ?>
            <tr>
                <td><?= $this->Number->format($payGrade->id) ?></td>
                <td><?= h($payGrade->name) ?></td>
                <td><?= h($payGrade->description) ?></td>
                <td><?= h($payGrade->status) ?></td>
                <td><?= h($payGrade->start_date) ?></td>
                <td><?= h($payGrade->end_date) ?></td>
                <td><?= $this->Number->format($payGrade->pay_grade_level) ?></td>
                <td><?= h($payGrade->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payGrade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payGrade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payGrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payGrade->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
