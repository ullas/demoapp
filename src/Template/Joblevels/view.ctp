<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
     Job Level
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
  	<?= $this->Form->create($joblevel, array('role' => 'form')) ?>
    <fieldset><?php
            echo $this->Form->input('name',['disabled'=>true]);
            echo $this->Form->input('external_code',['disabled'=>true]);
            echo $this->Form->input('description',['disabled'=>true]);
        ?></fieldset>
        <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Job Level'), ['action' => 'edit', $joblevel['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
