<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ids'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ids form large-9 medium-8 columns content">
    <?= $this->Form->create($id) ?>
    <fieldset>
        <legend><?= __('Add Id') ?></legend>
        <?php
            echo $this->Form->input('country');
            echo $this->Form->input('card_type');
            echo $this->Form->input('nationalid');
            echo $this->Form->input('is_primary');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
