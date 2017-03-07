<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
     Job Function
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
  	<?= $this->Form->create($jobFunction, array('role' => 'form')) ?>
    	<fieldset>
    		<?php
             	echo $this->Form->input('external_code',['disabled' => true]);
             	echo $this->Form->input('name',['disabled' => true]);
            	echo $this->Form->input('description',['disabled' => true]);
            	echo $this->Form->input('effective_status',['disabled' => true]);
				echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
				echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('job_function_type',['disabled' => true]);
            
        	?>
        </fieldset>
        <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit JobFunction'), ['action' => 'edit', $jobFunction['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
