<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payRange->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payRange->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pay Ranges'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payRanges form large-9 medium-8 columns content">
    <?= $this->Form->create($payRange) ?>
    <fieldset>
        <legend><?= __('Edit Pay Range') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('currency');
            echo $this->Form->input('frequency_code');
            echo $this->Form->input('minimum_pay');
            echo $this->Form->input('maximum_pay');
            echo $this->Form->input('increment');
            echo $this->Form->input('incr_percentage');
            echo $this->Form->input('mid_point');
            echo $this->Form->input('geo_zone');
            echo $this->Form->input('pay_group');
            echo $this->Form->input('legal_entity');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
