<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Notes
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
  	<?= $this->Form->create($note, array('role' => 'form')) ?>
  	<fieldset>
    <?php  
            echo $this->Form->input('title',['disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('visibleto',['disabled' => true,'class'=>'select2','options' => array('Admin', 'All'), 'empty' => true]);
          ?></fieldset>
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Note'), ['action' => 'edit', $note['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
