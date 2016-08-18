<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $holiday->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $holiday->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Holidays'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="holidays form large-9 medium-8 columns content">
    <?= $this->Form->create($holiday) ?>
    <fieldset>
        <legend><?= __('Edit Holiday') ?></legend>
        <?php
            echo $this->Form->input('holiday_class');
            echo $this->Form->input('name');
            echo $this->Form->input('date', ['empty' => true]);
            echo $this->Form->input('holiday_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
