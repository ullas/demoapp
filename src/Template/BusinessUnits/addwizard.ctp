<?= $this->element('templateelmnt'); ?>

<section class="content" style="padding: 1px;min-height:150px;">
	<?= $this->element('stepformwizardelmnt', array('wcontent' => 'BusinessUnit','wid' => '2')); ?>
</sction>
	
    <section class="content-header">
      <h1>
        Business Unit
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
		<?= $this->Form->create($businessUnit) ?>
    <fieldset>
        <?php
        	echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory']]);
			echo $this->Form->input('name',['label'=>['text'=>'Name','class'=>'mandatory']]);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('head_of_unit');
        ?>
    </fieldset>
    <div class="box-footer">
    	<?= $this->Form->button(__('Save Business Unit'),['class'=>'pull-right']) ?>
    </div>
    
    <?= $this->Form->end() ?>
</div></div></section>


