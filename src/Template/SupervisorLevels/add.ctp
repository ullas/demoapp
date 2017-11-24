<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Supervisor Level
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($supervisorLevel) ?>
    <fieldset>
        <?php
           echo $this->Form->input('name',['label'=>'Label']);
            echo $this->Form->input('description');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Supervisor Level'),['title'=>'Save Supervisor Level','class'=>'pull-right']) ?>
</div>
    <?= $this->Form->end() ?>
</div></div></section>

