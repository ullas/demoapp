<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Calendar Assignments
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($calendarAssignment) ?>
    <fieldset>
        <?php
            echo $this->Form->input('holiday_calendar_id', ['options' => $holidayCalendars, 'class' => 'select2']);
            echo $this->Form->input('assignmentyear', ['class' => 'mptlyp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('assignmentdate', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('holiday_id', ['options' => $holidays, 'class' => 'select2']);
        ?>
    </fieldset></div>
    <div class="box-footer">
    	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    	<?= $this->Form->button(__('Save'),['title'=>'Save','class'=>'pull-right']) ?> 
	</div>
    <?= $this->Form->end() ?>
</div></section>
