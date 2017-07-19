<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        User
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
         <!-- <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li> -->
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('role',['class'=>'select2','options' => ['admin' => 'Admin', 'employee' => 'Employee'], 'empty' => 'Choose']);
            echo $this->Form->input('username',['disabled'=>true]);
            echo $this->Form->input('name');
			echo $this->Form->input('dateformat',['class'=>'select2','options' => array("1"=>'dd/mm/yyyy [01/01/2017]',"2"=>'mm/dd/yyyy [01/01/2017]')]);
            echo $this->Form->input('customer_id', ['options' => $customers]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?= $this->Form->button(__('Update'),['title'=>'Update','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
