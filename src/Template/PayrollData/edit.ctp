<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Payroll Data
        <small>Edit</small>
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
    <!-- <?= $this->Form->button(__('Update Payroll Data'),['title'=>'Update Payroll Data','class'=>'pull-right']) ?> -->
    <input type="button" value="Update Payroll Data" class="mptlupdate btn btn-success pull-right" id="mptlupdate"/>
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
	
	window.onload = function () { 
		$('.pcomp').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata
		});
	
		$('.pcgroup').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata
		});
	}
	
$(function () {
	
	//save btn onclick
	$('#mptlupdate').click(function(){
    	//get input value
		var emp = $("#empdatabiographies-id").val();
		var startdate = $("#start-date").val();
		var enddate = $("#end-date").val();
		
		var pccount = $('.componentclass').length;
		var pcgcount = $('.groupclass').length;

    	if (emp!="" && emp!=null && (pccount>0 || pcgcount>0)) {
    		
    		
    		//initially deleteall payrolldata for the particular employee
    		$.get('/PayrollData/deleteAllData?employee='+emp, function(result) {
				// if(result=="Error"){

				// }
			});
					
    		//add paycomponent
    		var pcerrcount=0;
    		for (i = 1; i <= pccount; i++) {
    			var paycomp=$("#paycomponent"+i).val();
    			var paycompval=$("#paycomponentvalue"+i).val();
    			if(paycomp!="" && paycomp!=null && paycompval!="" && paycompval!=null){
					$.get('/PayrollData/addData?employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponent='+paycomp+'&paycomponentvalue='+paycompval+'&type=1', function(result) {
						if(result=="Error"){
							pcerrcount++;
						}
					});
				}
    		}	
    		if(pcerrcount>0){
    			sweet_alert("Error while adding Pay Component.");
				return false;
    		}
    		
    		//add paycomponent group
    		var pcgerrcount=0;
    		for (i = 1; i <= pcgcount; i++) {
    			var paycomp=$("#pcgroup"+i).val();
    			
    			var postdata="";
    			$("#pcgroup"+i).closest(".groupclass").children('.pcgcol').each(function(i, obj) {
    				postdata+=$(this).children('.col-sm-4').children('.form-group').children('.paycompnt').attr('name')+"^";
    				postdata+=$(this).children('.col-sm-4').children('.form-group').children('.paycompntval').val()+"|";console.log($(this).children('.col-sm-4').children('.form-group').children('.paycompnt').attr('name'));
				});
    			
    			
    			if(paycomp!="" && paycomp!=null && postdata!="" && postdata!=null){
					$.get('/PayrollData/addData?employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponent='+paycomp+'&paycomponentvalue='+postdata+'&type=2', function(result) {
						if(result=="Error"){
							pcgerrcount++;
						}
					});
				}
    		}	
    		if(pcgerrcount>0){
    			sweet_alert("Error while adding Pay Component Group.");
				return false;
    		}
    		
    		window.location = '/payroll-data'; 
    		
    	}else{
    		if(emp == "" || emp==null){sweet_alert("Please select a Employee.");}
    		else {sweet_alert("Please add a pay Component/Pay Component Group for the particular Employee.");}
    		return false;
    	}
  });
  
	
	$("#btnAddControl").click(function (event) {

		var emp = $("#empdatabiographies-id").val();
		if(emp!="" && emp!=null){
			event.preventDefault();
			var numItems = $('.componentclass').length+1;
			$(".maindiv").append("<div class='componentclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><div class='input-group'><div class='input-group-btn'><a class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='text' class='pcomp form-control' id='paycomponent"+numItems+"'/></div></div><div class='col-sm-4'><label>Pay Component Value:</label><input class='form-control'  id='paycomponentvalue"+numItems+"'/></div></div></div>");
		
			$('.pcomp').select2({
    			width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata
			});
		}else{
			sweet_alert("Please select a Employee.");
   			return false;
		}
		
	});
	
	$("#btnAddPCG").click(function (event) {
		
		var emp = $("#empdatabiographies-id").val();
		if(emp!="" && emp!=null){
			event.preventDefault();
		
			var numItems = $('.groupclass').length+1;
			$(".maindiv").append("<div class='clearfix'><div class='groupclass' id='groupDiv"+numItems+"'><div class='col-sm-4'><div class='form-group'><label>Pay Component Group:</label><div class='input-group'><div class='input-group-btn'><a class='groupdelete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div><input type='text' class='pcgroup form-control' id='pcgroup"+numItems+"'/></div></div></div></div></div>");
		
			$('.pcgroup').select2({
    			width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata
			});
		}else{
			sweet_alert("Please select a Employee.");
   			return false;
		}
		
	});	
	
	$('.maindiv').on('change', 'input.pcgroup', function() {
		$(this).parent().closest('div .groupclass').find('.groupcol').remove();
		
		var selectedCtrl = $(this);
		
		var selectedVal = this.value;
		$.get('/PayrollData/getPayComponentGroupData?pcgid='+selectedVal, function(result) {
			var obj = JSON.parse(result);
				var numItems = $('.groupclass').length+1;
    			for(t = 0; t < obj.length; t++){
    				
    				if(t>0){
    					selectedCtrl.closest(".groupclass").append("<div class='col-sm-4'></div>");
    				}
    				selectedCtrl.closest(".groupclass").append("<div class='pcgcol'><div class='col-sm-4 groupcol'><div class='form-group'><label>Pay Component:</label><input id='paycomp' disabled type='text' value='"+obj[t]['name']+"' class='form-control paycompnt' name='"+obj[t]['id']+"'></div></div><div class='col-sm-4 groupcol'><div class='form-group'><label>Pay Component Value:</label><input id='paycompval' type='text' class='form-control paycompntval'></div></div></div>");
    			}
    	});
    		
			// $(this).closest(".groupclass").append("<div class='col-sm-4 pcgcol'><div class='form-group'><label>Pay Component:</label><input type='text' class='form-control'></div><div class='form-group'><label>Pay Component:</label><input type='text' class='form-control'></div></div><div class='col-sm-4 pcgcol'><div class='form-group'><label>Pay Component Value:</label><input type='text' class='form-control'></div><div class='form-group'><label>Pay Component Value:</label><input type='text' class='form-control'></div></div>");
	});
	
	//load from db
	var paycomponentsarr='<?php echo $payComps ?>';
	var pcobj = JSON.parse(paycomponentsarr);

	// var numItems = $('.componentclass').length+1;
	for (i = 1; i <= pcobj.length; i++) {
		$(".maindiv").append("<div class='componentclass' id='contentDiv"+i+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><div class='input-group'><div class='input-group-btn'><a class='compdelete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div><input type='text' class='pcomp form-control' id='paycomponent"+i+"' value='"+ pcobj[i-1]['pay_component_id'] +"'/></div></div><div class='col-sm-4'><label>Pay Component Value:</label><input class='form-control'  id='paycomponentvalue"+i+"' value='"+ pcobj[i-1]['pay_component_value'] +"'/></div></div></div>");
	}
	

	var paycomponentgroupsarr='<?php echo $payCompGroups ?>';
	var pcgobj = JSON.parse(paycomponentgroupsarr);

	for (i = 1; i <= pcgobj.length; i++) {
		$(".maindiv").append("<div class='groupclass' id='groupDiv"+i+"'><div class='col-sm-4'><div class='form-group'><label>Pay Component Group:</label><div class='input-group'><div class='input-group-btn'><a class='groupdelete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div><input type='text' class='pcgroup form-control' value='"+ pcgobj[i-1]['pay_component_id'] +"' id='pcgroup"+i+"'/></div></div></div></div></div>");
		
		var resArr = pcgobj[i-1]['pay_component_value'].toString().split('|');
		
		var selectedCtrl = $("#groupDiv"+i);

		for (t = 0; t < resArr.length-1; t++) {
			var valArr = resArr[t].toString().split('^');
			if(t>0){
    			selectedCtrl.closest(".groupclass").append("<div class='col-sm-4'></div>");
    		}
			selectedCtrl.append("<div class='pcgcol'><div class='col-sm-4 groupcol'><div class='form-group'><label>Pay Component:</label><input id='paycomp' disabled type='text' value='"+ paycomponentarr[valArr[0]] +"' class='form-control paycompnt' name='"+valArr[0]+"'></div></div><div class='col-sm-4 groupcol'><div class='form-group'><label>Pay Component Value:</label><input id='paycompval' type='text' class='form-control paycompntval' value='"+ valArr[1] +"'></div></div></div>");
    			
		}
		
	}
	
	
	//delete btn onclick
	$('.maindiv').on('click', 'a.groupdelete', function() {
		if (confirm("Are you sure you want to delete the particular Pay Component Group ?")) {
			$(this).parent().closest('div .groupclass').remove();
    		return true;
  		} else {
    		return false;
  		}
   
	});
	
	$('.maindiv').on('click', 'a.compdelete', function() {
		if (confirm("Are you sure you want to delete the particular Pay Component ?")) {
			$(this).parent().closest('div .componentclass').remove();
    		return true;
  		} else {
    		return false;
  		}
   
	});
});

</script>
<?php $this->end(); ?>   