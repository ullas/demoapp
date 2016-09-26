<section class="content-header">
      <h1>
       Picklist
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($picklist) ?>
    <fieldset>
        <legend><?= __('Add Picklist') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('comments');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
