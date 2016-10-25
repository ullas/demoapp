<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $empDataPersonal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $empDataPersonal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Emp Data Personals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="empDataPersonals form large-9 medium-8 columns content">
    <?= $this->Form->create($empDataPersonal) ?>
    <fieldset>
        <legend><?= __('Edit Emp Data Personal') ?></legend>
        <?php
            echo $this->Form->input('salutation');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('initials');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('first_name_alt1');
            echo $this->Form->input('middle_name_alt1');
            echo $this->Form->input('last_name_alt1');
            echo $this->Form->input('first_name_alt2');
            echo $this->Form->input('middle_name_alt2');
            echo $this->Form->input('last_name_alt2');
            echo $this->Form->input('display_name');
            echo $this->Form->input('formal_name');
            echo $this->Form->input('birth_name');
            echo $this->Form->input('birth_name_alt1');
            echo $this->Form->input('birth_name_alt2');
            echo $this->Form->input('preferred_name');
            echo $this->Form->input('display_name_alt1');
            echo $this->Form->input('display_name_alt2');
            echo $this->Form->input('formal_name_alt1');
            echo $this->Form->input('formal_name_alt2');
            echo $this->Form->input('name_format');
            echo $this->Form->input('is_overridden');
            echo $this->Form->input('nationality');
            echo $this->Form->input('second_nationality');
            echo $this->Form->input('third_nationality');
            echo $this->Form->input('wps_code');
            echo $this->Form->input('uniqueid');
            echo $this->Form->input('prof_legal');
            echo $this->Form->input('exclude_legal');
            echo $this->Form->input('nationality_date', ['empty' => true]);
            echo $this->Form->input('home_airport');
            echo $this->Form->input('religion');
            echo $this->Form->input('number_children');
            echo $this->Form->input('disability_date', ['empty' => true]);
            echo $this->Form->input('disable_group');
            echo $this->Form->input('disable_degree');
            echo $this->Form->input('disable_type');
            echo $this->Form->input('disable_authority');
            echo $this->Form->input('disable_ref');
            echo $this->Form->input('person_id_external');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('employee_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
