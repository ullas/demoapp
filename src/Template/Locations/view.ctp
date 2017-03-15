<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Location
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
  	<?= $this->Form->create($location, array('role' => 'form')) ?>
  	<fieldset>
    <?php
            echo $this->Form->input('external_code',['label' =>'Location Code','disabled' => true]);
            echo $this->Form->input('name',['label' =>'Location Name','disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('status',['disabled' => true]);
			      echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			      echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('location_group',['disabled' => true]);
            echo $this->Form->input('time_zone',['label' =>'Timezone','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>'],'disabled' => true]);
            echo $this->Form->input('standard_hours',['label' =>'Standard Weekly Hours','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>'],'disabled' => true]);
			      echo $this->Form->input('holiday_calendar_id',['label' =>'Default Holiday Calendar','disabled' => true,'class'=>'select2', 'empty' => true]);
          ?></fieldset>
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Location'), ['action' => 'edit', $location['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
