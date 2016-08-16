<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $frequency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $frequency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="frequencies form large-9 medium-8 columns content">
    <?= $this->Form->create($frequency) ?>
    <fieldset>
        <legend><?= __('Edit Frequency') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('annualization_factor');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
