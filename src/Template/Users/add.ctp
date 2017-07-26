<section class="content-header">
      <h1>
        User
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('role',['class'=>'select2','options' => ['admin' => 'Admin', 'employee' => 'Employee'], 'empty' => 'Choose']);
			echo $this->Form->input('dateformat',['class'=>'select2','options' => array('mm/dd/yyyy', 'dd/mm/yyyy'), 'empty' => 'Choose']);
            echo $this->Form->input('username');
            echo $this->Form->input('name');
            echo $this->Form->input('customer_id', ['options' => $customers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
