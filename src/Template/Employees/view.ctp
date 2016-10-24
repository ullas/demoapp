<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'EmpDataBiographies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'EmpDataBiographies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emp Data Personals'), ['controller' => 'EmpDataPersonals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emp Data Personal'), ['controller' => 'EmpDataPersonals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employment Infos'), ['controller' => 'EmploymentInfos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employment Info'), ['controller' => 'EmploymentInfos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Emp Data Biography') ?></th>
            <td><?= $employee->has('emp_data_biography') ? $this->Html->link($employee->emp_data_biography->id, ['controller' => 'EmpDataBiographies', 'action' => 'view', $employee->emp_data_biography->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Data Personal') ?></th>
            <td><?= $employee->has('emp_data_personal') ? $this->Html->link($employee->emp_data_personal->id, ['controller' => 'EmpDataPersonals', 'action' => 'view', $employee->emp_data_personal->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Employment Info') ?></th>
            <td><?= $employee->has('employment_info') ? $this->Html->link($employee->employment_info->id, ['controller' => 'EmploymentInfos', 'action' => 'view', $employee->employment_info->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($employee->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Employment Info Id') ?></th>
            <td><?= $this->Number->format($employee->employment_info_id) ?></td>
        </tr>
    </table>
</div>
