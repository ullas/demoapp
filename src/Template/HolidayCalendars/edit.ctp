<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Holiday Calendar
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($holidayCalendar) ?>
    <fieldset>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('name');
            echo $this->Form->input('country');
            echo $this->Form->input('valid_from', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('valid_to', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
		
        ?>
    </fieldset>
   </div>
   <div class="box-footer">
    	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    	<?= $this->Form->button(__('Update'),['title'=>'Update','class'=>'pull-right']) ?> 
	</div>
   </div></section>
