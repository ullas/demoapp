<section class="content-header">
      <h1>
        Contact Info
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
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
</div></div></section>
