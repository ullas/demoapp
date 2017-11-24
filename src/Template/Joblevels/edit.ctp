<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Job Level
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($joblevel) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name',['label'=>'Label']);
            echo $this->Form->input('external_code');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Job Level'),['title'=>'Update Job Level','class'=>'pull-right']) ?>
</div>
    <?= $this->Form->end() ?>
</div></div></section>
