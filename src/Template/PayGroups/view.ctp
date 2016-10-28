<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Pay Group
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
  	  	<?= $this->Form->create($payGroup, array('role' => 'form')) ?>
    <?php
            echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('effective_status',['disabled' => true]);
			echo $this->Form->input('effective_start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('effective_end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('earliest_change_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('payment_frequency',['disabled' => true]);
            echo $this->Form->input('primary_contactid',['disabled' => true]);
            echo $this->Form->input('primary_contact_email',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-envelope"></i></div>'],'disabled' => true]);
            echo $this->Form->input('primary_contact_name',['disabled' => true]);
            echo $this->Form->input('secondary_contactid',['disabled' => true]);
            echo $this->Form->input('secondary_contact_email',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-envelope"></i></div>'],'disabled' => true]);
            echo $this->Form->input('secondary_contact_name',['disabled' => true]);
            echo $this->Form->input('weeks_in_pay_period',['disabled' => true]);
            echo $this->Form->input('data_delimiter',['disabled' => true]);
            echo $this->Form->input('decimal_point',['disabled' => true]);
            echo $this->Form->input('lag',['disabled' => true]);
            echo $this->Form->input('external_code',['disabled' => true]);
        ?>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Paygroup'), ['action' => 'edit', $payGroup['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>

