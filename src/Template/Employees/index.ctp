<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'EmpDataBiographies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'EmpDataBiographies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emp Data Personals'), ['controller' => 'EmpDataPersonals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emp Data Personal'), ['controller' => 'EmpDataPersonals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employment Infos'), ['controller' => 'EmploymentInfos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employment Info'), ['controller' => 'EmploymentInfos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employees index large-9 medium-8 columns content">
    <h3><?= __('Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('emp_data_biography_id') ?></th>
                <th><?= $this->Paginator->sort('emp_data_personal_id') ?></th>
                <th><?= $this->Paginator->sort('employment_info_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $this->Number->format($employee->id) ?></td>
                <td><?= $employee->has('emp_data_biography') ? $this->Html->link($employee->emp_data_biography->id, ['controller' => 'EmpDataBiographies', 'action' => 'view', $employee->emp_data_biography->id]) : '' ?></td>
                <td><?= $employee->has('emp_data_personal') ? $this->Html->link($employee->emp_data_personal->id, ['controller' => 'EmpDataPersonals', 'action' => 'view', $employee->emp_data_personal->id]) : '' ?></td>
                <td><?= $this->Number->format($employee->employment_info_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
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
