
<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Payroll Data
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body maindiv">
    <?= $this->Form->create($payrollData) ?>
    <fieldset>
        <?php
            echo $this->Form->input('empdatabiographies_id',['options'=>$empDataBiographies,'label'=>'Employee','class' => 'select2', 'empty' => true]);
			echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			
            // echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'empty' => true, 'class'=>'select2 mptldynamic']);
            // echo $this->Form->input('pay_component_value', ['class'=>'mptldynamic']);
            
        ?>
        
        <div class="col-md-4"><div class="form-group">
        	<div class="input-group">
        		<input type="button" class="btn btn-flat btn-info" id="btnAddControl" value="Add Pay Component" />
        	</div>
        </div></div>
        
        <div class="col-md-4 pull-right"><div class="form-group">
        	<div class="input-group" >        		
        		<input type="button" class="btn btn-flat btn-info pull-right" id="btnAddControl" value="Add Pay Component Group" />
        	</div>
        </div></div>
        
    </fieldset></div>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Payroll Data'),['title'=>'Save Payroll Data','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></section>


<?php $this->start('scriptBotton'); ?>
<script>

$(function () {
	
	$("#btnAddControl").click(function (event) {
		
		
		event.preventDefault();
		var numItems = $('.classname').length+1;
		$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><input type='text' 	class='form-control' id='type"+numItems+"'/></div><div class='col-sm-4'><label>Pay Component Value:</label><input id='test' class='form-control test' name='test'/></div></div><hr/></div>");
	});	

});

</script>
<?php $this->end(); ?>      	 