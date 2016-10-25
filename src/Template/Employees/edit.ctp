<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'EmpDataBiographies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'EmpDataBiographies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emp Data Personals'), ['controller' => 'EmpDataPersonals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emp Data Personal'), ['controller' => 'EmpDataPersonals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employment Infos'), ['controller' => 'EmploymentInfos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employment Info'), ['controller' => 'EmploymentInfos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?></legend>
        <?php
            echo $this->Form->input('emp_data_biography_id');
            echo $this->Form->input('emp_data_personal_id');
            echo $this->Form->input('employment_info_id');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
