
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
        		<input type="button" class="btn btn-flat btn-info pull-right" id="btnAddPCG" value="Add Pay Component Group" />
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
	var paycomponentdata=[];
	var paycomponentarr=<?php echo $paycomponentarr ?>;
	$.each(paycomponentarr, function(key, value) {
    	paycomponentdata.push({'id':key, "text":value});
	});
	
	var paycomponentgroupdata=[];
	var paycomponentgrouparr=<?php echo $paycomponentgrouparr ?>;
	$.each(paycomponentgrouparr, function(key, value) {
    	paycomponentgroupdata.push({'id':key, "text":value});
	});
	
    
$(function () {
	
	$('.maindiv').on('change', 'input.pcgroup', function() {
		var selectedVal = this.value;
		$(this).parent().closest('div .groupclass').find('.pcgcol').remove();
		// var cnt=$(this).closest(".groupclass").find('.col-sm-4').length;
		// if(cnt<2){
			$(this).closest(".groupclass").append("<div class='col-sm-4 pcgcol'><div class='form-group'><label>Pay Component:</label><input type='text' class='form-control'></div><div class='form-group'><label>Pay Component:</label><input type='text' class='form-control'></div></div><div class='col-sm-4 pcgcol'><div class='form-group'><label>Pay Component Value:</label><input type='text' class='form-control'></div><div class='form-group'><label>Pay Component Value:</label><input type='text' class='form-control'></div></div>");
		// }
	});
	
	$("#btnAddControl").click(function (event) {
		
		event.preventDefault();
		var numItems = $('.classname').length+1;
		$(".maindiv").append("<div class='classname'	id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><input type='text' class='pcomp form-control' id='type"+numItems+"'/></div><div class='col-sm-4'><label>Pay Component Value:</label><input id='test' class='form-control test' name='test'/></div></div><hr/></div>");
		
		$('.pcomp').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata
		});
		
	});
	
	$("#btnAddPCG").click(function (event) {
		
		event.preventDefault();
		
		var numItems = $('.groupclass').length+1;
		$(".maindiv").append("<div class='clearfix'><div class='groupclass' id='groupDiv"+numItems+"'><div class='col-sm-4'><div class='form-group'><label>Pay Component Group:</label><div class='input-group'><div class='input-group-btn'><a class='groupdelete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div><input type='text' class='pcgroup form-control' id='type"+numItems+"'/></div></div></div></div></div>");
		
		$('.pcgroup').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata
		});
		
	});	
	
	//delete btn onclick
	$('.maindiv').on('click', 'a.groupdelete', function() {
		if (confirm("Are you sure you want to delete the particular Pay Component Group ?")) {
			$(this).parent().closest('div .groupclass').remove();
    		return true;
  		} else {
    		return false;
  		}
   
	});
	
});

</script>
<?php $this->end(); ?>      	 