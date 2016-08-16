<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pay Component Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payComponentGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($payComponentGroup) ?>
    <fieldset>
        <legend><?= __('Add Pay Component Group') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('currency');
            echo $this->Form->input('show_on_comp_ui');
            echo $this->Form->input('use_for_comparatio_calc');
            echo $this->Form->input('use_for_range_penetration');
            echo $this->Form->input('sort_order');
            echo $this->Form->input('system_defined');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
