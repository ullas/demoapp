<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cost Centres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="costCentres form large-9 medium-8 columns content">
    <?= $this->Form->create($costCentre) ?>
    <fieldset>
        <legend><?= __('Add Cost Centre') ?></legend>
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
