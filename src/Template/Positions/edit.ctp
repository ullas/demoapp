<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $position->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $position->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="positions form large-9 medium-8 columns content">
    <?= $this->Form->create($position) ?>
    <fieldset>
        <legend><?= __('Edit Position') ?></legend>
        <?php
            echo $this->Form->input('external_name');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo $this->Form->input('type');
            echo $this->Form->input('position_criticality');
            echo $this->Form->input('position_controlled');
            echo $this->Form->input('multiple_incumbents_allowed');
            echo $this->Form->input('comment');
            echo $this->Form->input('incumbent');
            echo $this->Form->input('change_reason');
            echo $this->Form->input('description');
            echo $this->Form->input('job_title');
            echo $this->Form->input('job_code');
            echo $this->Form->input('job_level');
            echo $this->Form->input('employee_class');
            echo $this->Form->input('regular_temporary');
            echo $this->Form->input('pay_grade');
            echo $this->Form->input('target_fte');
            echo $this->Form->input('vacant');
            echo $this->Form->input('standard_hours');
            echo $this->Form->input('company');
            echo $this->Form->input('business_unit');
            echo $this->Form->input('division');
            echo $this->Form->input('department');
            echo $this->Form->input('location');
            echo $this->Form->input('cost_center');
            echo $this->Form->input('created_by');
            echo $this->Form->input('created_date', ['empty' => true]);
            echo $this->Form->input('last_modified_by');
            echo $this->Form->input('last_modified_date', ['empty' => true]);
            echo $this->Form->input('parent_position');
            echo $this->Form->input('pay_range');
            echo $this->Form->input('position_matrix_relationship');
            echo $this->Form->input('right_to_return');
            echo $this->Form->input('code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
