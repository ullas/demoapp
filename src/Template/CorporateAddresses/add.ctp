<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Corporate Addresses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="corporateAddresses form large-9 medium-8 columns content">
    <?= $this->Form->create($corporateAddress) ?>
    <fieldset>
        <legend><?= __('Add Corporate Address') ?></legend>
        <?php
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('address1');
            echo $this->Form->input('address2');
            echo $this->Form->input('address3');
            echo $this->Form->input('city');
            echo $this->Form->input('county');
            echo $this->Form->input('state');
            echo $this->Form->input('province');
            echo $this->Form->input('zip_code');
            echo $this->Form->input('country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
