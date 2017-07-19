<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Compensation'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="compensation form large-9 medium-8 columns content">
    <?= $this->Form->create($compensation) ?>
    <fieldset>
        <legend><?= __('Add Compensation') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
