<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $officeAsset->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $officeAsset->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Office Assets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officeAssets form large-9 medium-8 columns content">
    <?= $this->Form->create($officeAsset) ?>
    <fieldset>
        <legend><?= __('Edit Office Asset') ?></legend>
        <?php
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('employee_id', ['options' => $employees, 'empty' => true]);
            echo $this->Form->input('location');
            echo $this->Form->input('assettype');
            echo $this->Form->input('assetnumber');
            echo $this->Form->input('assetdescription');
            echo $this->Form->input('issuedate', ['empty' => true]);
            echo $this->Form->input('todate', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
