<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Employee Class
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($employeeClass) ?>
    <fieldset>
        <?php
           echo $this->Form->input('name',['label'=>'Class']);
            echo $this->Form->input('description');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Employee Class'),['title'=>'Save Employee Class','class'=>'pull-right']) ?>
</div>
    <?= $this->Form->end() ?>
</div></div></section>

