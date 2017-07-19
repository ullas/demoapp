<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $compensation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $compensation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Compensation'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="compensation form large-9 medium-8 columns content">
    <?= $this->Form->create($compensation) ?>
    <fieldset>
        <legend><?= __('Edit Compensation') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
