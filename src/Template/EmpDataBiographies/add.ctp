<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="empDataBiographies form large-9 medium-8 columns content">
    <?= $this->Form->create($empDataBiography) ?>
    <fieldset>
        <legend><?= __('Add Emp Data Biography') ?></legend>
        <?php
            echo $this->Form->input('date_of_birth', ['empty' => true]);
            echo $this->Form->input('country_of_birth');
            echo $this->Form->input('region_of_birth');
            echo $this->Form->input('place_of_birth');
            echo $this->Form->input('birth_name');
            echo $this->Form->input('date_of_death', ['empty' => true]);
            echo $this->Form->input('person_id_external');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
