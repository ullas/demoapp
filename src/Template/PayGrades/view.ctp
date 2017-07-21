<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Pay Grade
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
      <?= $this->Form->create($payGrade, array('role' => 'form')) ?>
      <fieldset>
		<?php
            echo $this->Form->input('external_code',['label' => 'Pay Grade Code','disabled' => true]);
            echo $this->Form->input('name',['label' => 'Pay Grade Name''disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('status',['disabled' => true]);
			      echo $this->Form->input('start_date',['value' => !empty($payGrade->start_date) ? $payGrade->start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('end_date',['value' => !empty($payGrade->end_date) ? $payGrade->end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('pay_grade_level',['disabled' => true]);

        ?>
        </fieldset>
        </div><div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Pay Grade'), ['action' => 'edit', $payGrade['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></section>
