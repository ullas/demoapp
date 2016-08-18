<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $costCentre->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $costCentre->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cost Centres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="costCentres form large-9 medium-8 columns content">
    <?= $this->Form->create($costCentre) ?>
    <fieldset>
        <legend><?= __('Edit Cost Centre') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo $this->Form->input('parent_cost_center');
            echo $this->Form->input('external_code');
            echo $this->Form->input('cost_center_manager');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
