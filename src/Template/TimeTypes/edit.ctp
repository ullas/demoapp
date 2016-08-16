<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timeType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timeType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Time Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timeTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($timeType) ?>
    <fieldset>
        <legend><?= __('Edit Time Type') ?></legend>
        <?php
            echo $this->Form->input('country');
            echo $this->Form->input('classification');
            echo $this->Form->input('unit');
            echo $this->Form->input('perm_fractions_days');
            echo $this->Form->input('workflow');
            echo $this->Form->input('perm_fractions_hours');
            echo $this->Form->input('calc_base');
            echo $this->Form->input('flex_req_allow');
            echo $this->Form->input('time_acc_type');
            echo $this->Form->input('take_rule');
            echo $this->Form->input('code');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
