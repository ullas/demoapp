
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
    <!-- <?= $this->Form->button(__('Save Payroll Data'),['title'=>'Save Payroll Data','class'=>'pull-right']) ?> -->
    <input type="button" value="Save Payroll Data" class="mptlsave btn btn-success pull-right" id="mptlsave"/>
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
	
	function changePayComponentData(){
		
		var paydata=[];
		
		var pccount = $('.componentclass').length;
		var pcarr=[];
		for (i = 1; i <= pccount; i++) {
    		var paycomp=$("#paycomponent"+i).val();
    		pcarr.push(paycomp);
    	}
    	
    	$.each(paycomponentarr, function(key, value) {
    		if ((!(pcarr.indexOf(key) > -1))  ) {
				paydata.push({'id':key, "text":value});
			}
		});
		
		console.log(pccount);
		console.log(paydata);
		
    	$('input.pcomp').each(function(i, obj) {
				
			var selectedCtrl = $(this);
			var selectedVal = this.value;

			if(selectedVal!=null && selectedVal!=""){
				
				var pcdata=[];
				pcdata==paydata;
				$.each(paycomponentarr, function(key, value) {
    				if (key==selectedVal) {
						pcdata.push({'id':key, "text":value});
					}
					selectedCtrl.select2({
    					width: '100%',allowClear: true,placeholder: "Select",data: pcdata
					});
				});
				
			}else{
				selectedCtrl.select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paydata
				});
			}
		});
		
	}
    
    function changePayComponentGroupData(){
		
		var paygroupdata=[];
		
		var pcgcount = $('.groupclass').length;
		var pcgarr=[];
		for (i = 1; i <= pcgcount; i++) {
    		var paycompgroup=$("#pcgroup"+i).val();
    		pcgarr.push(paycompgroup);
    	}
    	
    	$.each(paycomponentgrouparr, function(key, value) {
    		if ((!(pcgarr.indexOf(key) > -1))  ) {
				paygroupdata.push({'id':key, "text":value});
			}
		});
		
		
    	$('input.pcgroup').each(function(i, obj) {
				
			var selectedCtrl = $(this);
			var selectedVal = this.value;

			if(selectedVal!=null && selectedVal!=""){
				
				var pcgdata=[];
				pcgdata==paygroupdata;
				$.each(paycomponentgrouparr, function(key, value) {
    				if (key==selectedVal) {
						pcgdata.push({'id':key, "text":value});
					}
					selectedCtrl.select2({
    					width: '100%',allowClear: true,placeholder: "Select",data: pcgdata
					});
				});
				
			}else{
				selectedCtrl.select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paygroupdata
				});
			}
		});
		
	}
$(function () {
	
	//save btn onclick
	$('#mptlsave').click(function(){
    	//get input value
		var emp = $("#empdatabiographies-id").val();
		var startdate = $("#start-date").val();
		var enddate = $("#end-date").val();
		
		var pccount = $('.componentclass').length;
		var pcgcount = $('.groupclass').length;

    	if (emp!="" && emp!=null && (pccount>0 || pcgcount>0)) {
    		
    		//add paycomponent
    		var pcerrcount=0;
    		for (i = 1; i <= pccount; i++) {
    			var paycomp=$("#paycomponent"+i).val();
    			var paycompval=$("#paycomponentvalue"+i).val();
    			
				if(paycomp!="" && paycomp!=null && startdate!="" && startdate!=null && enddate!="" && enddate!=null){
					
					$.ajax({
        				type: "POST",
      					url: '/PayrollData/addData',
        				indexValue: i,
        				data: 'employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponent='+paycomp+'&paycomponentvalue='+paycompval+'&type=1',
        				success : function(data) {
        					if(result=="success"){
    							if((this.indexValue==pccount || this.indexValue>pccount)  && pcerrcount<1){
    								if(pcgcount<1){
    									window.location='/payroll-data';
    								}
    							}
    						}else{
    							pcerrcount++;
    							sweet_alert("Error while adding PayComponent's.");
								return false;  
    						}
    						
        				},error: function(data) {
        					pcerrcount++;
       						sweet_alert("Error while adding PayComponent's.");
							return false;   			

        				},statusCode: {
        					500: function() {
        						pcerrcount++;
          						sweet_alert("Error while adding PayComponent's.");
								return false;
        					}
      					}
      
        			});
					
				}else{
					sweet_alert("Pay Component Value/Start/End Date missing.");break;
					return false;
				}
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
    			
    			
    			// if(paycomp!="" && paycomp!=null && postdata!="" && postdata!=null){
					// $.get('/PayrollData/addData?employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponent='+paycomp+'&paycomponentvalue='+postdata+'&type=2', function(result) {
						// if(result=="Error"){
							// pcgerrcount++;
						// }
					// });
				// }
				
				if(paycomp!="" && paycomp!=null && postdata!="" && postdata!=null){
    				
    				$.ajax({
        				type: "POST",
      					url: '/PayrollData/addData',
        				indexValue: i,
        				data: 'employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponent='+paycomp+'&paycomponentvalue='+postdata+'&type=2',
        				success : function(result) {
        					if(result=="success"){
    							if(this.indexValue==pcgcount || this.indexValue>pcgcount){
    								if(pcgerrcount<1){
    									window.location='/payroll-data';
    								}else{
    									sweet_alert("Error while adding PayComponent Group's.");
										return false; 
    								}
    							}
    						}else{
    							pcgerrcount++;
    							sweet_alert("Error while adding PayComponent Group's.");
								return false;  
    						}
    						
        				},error: function(data) {
        					pcgerrcount++;
       						sweet_alert("Error while adding PayComponent Group's.");
							return false;   			

        				},statusCode: {
        					500: function() {
        						pcgerrcount++;
          						sweet_alert("Error while adding PayComponent Group's.");
								return false;
        					}
      					}
      
        			});
  
				}else{
					sweet_alert("Pay Component Group missing.");break;
					return false;
				}
				
    		}	
    		// if(pcgerrcount>0){
    			// sweet_alert("Error while adding Pay Component Group.");
				// return false;
    		// }
    		
    		// window.location = '/payroll-data'; 
    		
    	}else{
    		if(emp == "" || emp==null){sweet_alert("Please select a Employee.");}
    		else {sweet_alert("Please add a pay Component/Pay Component Group for the particular Employee.");}
    		return false;
    	}
  });
    
    	$('.maindiv').on('change', 'input.pcomp', function() {
		
			
			
			// $('input.pcomp').each(function(i, obj) {
// 				
				// var selectedCtrl = $(this);
				// var selectedVal = this.value;
				changePayComponentData();
    			// console.log(selectedVal);
				// if(selectedVal!=null && selectedVal!=""){
// 				
				// }else{
// 				
				// }
			// });
		
		});		

    		
	$('.maindiv').on('change', 'input.pcgroup', function() {
		
		changePayComponentGroupData();
		
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
	
	$("#btnAddControl").click(function (event) {

		var emp = $("#empdatabiographies-id").val();
		if(emp!="" && emp!=null){
			event.preventDefault();
			var numItems = $('.componentclass').length+1;
			$(".maindiv").append("<div class='componentclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><div class='input-group'><div class='input-group-btn'><a class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='text' class='pcomp form-control' id='paycomponent"+numItems+"'/></div></div><div class='col-sm-4'><label>Pay Component Value:</label><input class='form-control'  id='paycomponentvalue"+numItems+"'/></div></div></div>");
			if(numItems<1){
				$('.pcomp').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata
				});
			}else{
				changePayComponentData();
			}	
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
			if(numItems<1){
				$('.pcgroup').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata
				});
			}else{
				changePayComponentGroupData();
			}
			
		}else{
			sweet_alert("Please select a Employee.");
   			return false;
		}
		
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