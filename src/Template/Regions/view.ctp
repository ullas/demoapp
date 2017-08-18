<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Region
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
  	<?= $this->Form->create($region, array('role' => 'form')) ?>
    <fieldset><?php
            echo $this->Form->input('external_code',['label' => 'Region Code','disabled' => true]);
            echo $this->Form->input('name',['label' => 'Region Name','disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
			echo $this->Form->input('start_date',['value' => !empty($region->start_date) ? $region->start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('end_date',['value' => !empty($region->end_date) ? $region->end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('status',['label'=>"Active",'disabled' => true]);

        ?></fieldset>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Region'), ['action' => 'edit', $region['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
