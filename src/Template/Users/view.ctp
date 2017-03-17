<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Users
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
        <?= $this->Form->create($user, array('role' => 'form')) ?>
        <fieldset>
          <?php
           echo $this->Form->input('email',['disabled' => true]);
            echo $this->Form->input('password',['disabled' => true]);
            echo $this->Form->input('role',['class'=>'select2','options' => ['admin' => 'Admin', 'employee' => 'Employee'], 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('username',['disabled'=>true]);
            echo $this->Form->input('name',['disabled' => true]);
			echo $this->Form->input('dateformat',['class'=>'select2','options' => array('yyyy/mm/dd [2017/01/01]', 'dd/mm/yyyy [01/01/2017]'), 'empty' => 'Choose','disabled' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers,'disabled' => true]);
			
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit User'), ['action' => 'edit', $user['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
