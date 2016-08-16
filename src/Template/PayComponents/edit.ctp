<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payComponent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payComponent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pay Components'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="payComponents form large-9 medium-8 columns content">
    <?= $this->Form->create($payComponent) ?>
    <fieldset>
        <legend><?= __('Edit Pay Component') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('pay_component_type');
            echo $this->Form->input('is_earning');
            echo $this->Form->input('currency');
            echo $this->Form->input('pay_component_value');
            echo $this->Form->input('frequency_code');
            echo $this->Form->input('recurring');
            echo $this->Form->input('base_pay_component_group');
            echo $this->Form->input('tax_treatment');
            echo $this->Form->input('can_override');
            echo $this->Form->input('self_service_description');
            echo $this->Form->input('display_on_self_service');
            echo $this->Form->input('used_for_comp_planning');
            echo $this->Form->input('target');
            echo $this->Form->input('is_relevant_for_advance_payment');
            echo $this->Form->input('max_fraction_digits');
            echo $this->Form->input('unit_of_measure');
            echo $this->Form->input('rate');
            echo $this->Form->input('number');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
