<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="container content">
    <?= $this->Form->create($address) ?>
    <fieldset>
        <legend><?= __('Add Address') ?></legend>
        <?php
            echo $this->Form->input('address_no');
            echo $this->Form->input('address1');
            echo $this->Form->input('address2');
            echo $this->Form->input('address3');
            echo $this->Form->input('address4');
            echo $this->Form->input('address5');
            echo $this->Form->input('address6');
            echo $this->Form->input('address7');
            echo $this->Form->input('address8');
            echo $this->Form->input('zip_code');
            echo $this->Form->input('city');
            echo $this->Form->input('county');
            echo $this->Form->input('state');
            echo $this->Form->input('person_id_external');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
