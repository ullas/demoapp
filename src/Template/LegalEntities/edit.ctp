<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $legalEntity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $legalEntity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Legal Entities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="legalEntities form large-9 medium-8 columns content">
    <?= $this->Form->create($legalEntity) ?>
    <fieldset>
        <legend><?= __('Edit Legal Entity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo $this->Form->input('default_pay_group');
            echo $this->Form->input('country_of_registration');
            echo $this->Form->input('standard_weekly_hours');
            echo $this->Form->input('currency');
            echo $this->Form->input('official_language');
            echo $this->Form->input('external_code');
            echo $this->Form->input('location_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
