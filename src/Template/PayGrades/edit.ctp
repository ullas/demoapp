<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payGrade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payGrade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pay Grades'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payGrades form large-9 medium-8 columns content">
    <?= $this->Form->create($payGrade) ?>
    <fieldset>
        <legend><?= __('Edit Pay Grade') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('pay_grade_level');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
