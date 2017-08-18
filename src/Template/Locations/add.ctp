<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Location
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
        <?php
            echo $this->Form->input('external_code',['label' =>'Location Code']);
			      echo $this->Form->input('name',['label' =>'Location Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status',['label' =>'Active']);
			      echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			      echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('location_group');
            echo $this->Form->input('time_zone',['label' =>'Timezone','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
			      echo $this->Form->input('standard_hours',['label' =>'Standard Weekly Hours','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
			      echo $this->Form->input('holiday_calendar_id',['label' =>'Default Holiday Calendar','class'=>'select2', 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Location'),['title'=>'Save Location','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
