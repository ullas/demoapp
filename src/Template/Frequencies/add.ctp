<section class="content-header">
      <h1>
        Frequency
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($frequency) ?>
    <fieldset>
        <legend><?= __('Add Frequency') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('annualization_factor');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
