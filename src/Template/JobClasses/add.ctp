<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Jobclasses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pay Grades'), ['controller' => 'PayGrades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Grade'), ['controller' => 'PayGrades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Job Functions'), ['controller' => 'JobFunctions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Function'), ['controller' => 'JobFunctions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobclasses form large-9 medium-8 columns content">
    <?= $this->Form->create($jobclass) ?>
    <fieldset>
        <legend><?= __('Add Jobclass') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo $this->Form->input('worker_comp_code');
            echo $this->Form->input('default_job_level');
            echo $this->Form->input('standard_weekly_hours');
            echo $this->Form->input('regular_temporary');
            echo $this->Form->input('default_employee_class');
            echo $this->Form->input('full_time_employee');
            echo $this->Form->input('default_supervisor_level');
            echo $this->Form->input('external_code');
            echo $this->Form->input('pay_grade_id', ['options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('job_function_id', ['options' => $jobFunctions, 'empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('job_id', ['options' => $jobs, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
