<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contact Infos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="contactInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($contactInfo) ?>
    <fieldset>
        <legend><?= __('Add Contact Info') ?></legend>
        <?php
            echo $this->Form->input('phone');
            echo $this->Form->input('mobile');
            echo $this->Form->input('email_address1');
            echo $this->Form->input('email_address2');
            echo $this->Form->input('facebook');
            echo $this->Form->input('linkedin');
            echo $this->Form->input('person_id_external');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
