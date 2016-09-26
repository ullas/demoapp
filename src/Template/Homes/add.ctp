<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Homes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="homes form large-9 medium-8 columns content">
    <?= $this->Form->create($home) ?>
    <fieldset>
        <legend><?= __('Add Home') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
