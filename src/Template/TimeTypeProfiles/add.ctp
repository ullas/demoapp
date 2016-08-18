<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Time Type Profiles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timeTypeProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($timeTypeProfile) ?>
    <fieldset>
        <legend><?= __('Add Time Type Profile') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('country');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('time_rec_variant');
            echo $this->Form->input('status');
            echo $this->Form->input('time_type');
            echo $this->Form->input('enable_ess');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
