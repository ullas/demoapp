<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $jobClass->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jobClass->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Job Classes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="jobClasses form large-9 medium-8 columns content">
    <?= $this->Form->create($jobClass) ?>
    <fieldset>
        <legend><?= __('Edit Job Class') ?></legend>
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
            echo $this->Form->input('pay_grade');
            echo $this->Form->input('job_function');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>