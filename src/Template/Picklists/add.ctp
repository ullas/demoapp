<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Picklists'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="picklists form large-9 medium-8 columns content">
    <?= $this->Form->create($picklist) ?>
    <fieldset>
        <legend><?= __('Add Picklist') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('comments');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
