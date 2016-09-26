<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orgChart->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orgChart->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Org Charts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="orgCharts form large-9 medium-8 columns content">
    <?= $this->Form->create($orgChart) ?>
    <fieldset>
        <legend><?= __('Edit Org Chart') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
