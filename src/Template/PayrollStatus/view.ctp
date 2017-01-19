<section class="content-header">
  <h1>
    Payroll Status
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
    <?= $this->Form->create($payRange, array('role' => 'form')) ?>
    <?php
            echo $this->Form->input('code',['disabled' => true);
            echo $this->Form->input('payroll_area_id', ['options' => $payrollArea, 'disabled' => true);
            echo $this->Form->input('current_period',['disabled' => true]);
            echo $this->Form->input('earliest_retro_date', ['disabled' => true]);
            echo $this->Form->input('payroll_lock',['disabled' => true]);
            echo $this->Form->input('lock_date', ['disabled' => true]);
            echo $this->Form->input('lock_time', ['disabled' => true]);
        ?>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit PayrollStatus'), ['action' => 'edit', $payRange['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
