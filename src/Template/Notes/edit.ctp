<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Notes
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($note) ?>
    <fieldset>
        <?php
            // echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            // echo $this->Form->input('created_at', ['empty' => true]);
            // echo $this->Form->input('modified_at', ['empty' => true]);
            echo $this->Form->input('visibleto',['class'=>'select2','options' => array('Admin', 'All'), 'empty' => true]);
            // echo $this->Form->input('emp_data_biographies_id', ['options' => $empdatabiographies, 'empty' => true]);
            // echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Note'),['title'=>'Save Note','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
