
<?= $this->element('templateelmnt'); ?>
<style>
	.pcaddbtn, .pcgroupaddbtn{
		margin-top:25px;
	}
</style>
<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Add Payroll Data</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>

    <?= $this->Form->create($payrollData) ?>
    <div class="box-body maindiv">
    <fieldset>
        <?php
            echo $this->Form->input('empdatabiographies_id',['options'=>$excludingempDataBiographies,'label'=>'Employee','class' => 'select2', 'empty' => true]);
			// echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            // echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);

            // echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'empty' => true, 'class'=>'select2 mptldynamic']);
            // echo $this->Form->input('pay_component_value', ['class'=>'mptldynamic']);

        ?>

        <div class="col-md-4"><div class="form-group">
        	<div class="input-group">
        		<input type="button" class="pcaddbtn btn btn-flat btn-info" id="btnAddControl" value="Add Pay Component" />
        	</div>
        </div></div>

        <div class="col-md-4 pull-right"><div class="form-group">
        	<div class="input-group" >
        		<input type="button" class="pcgroupaddbtn btn btn-flat btn-info" id="btnAddPCG" value="Add Pay Component Group" />
        	</div>
        </div></div>

    </fieldset></div>

    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <!-- <?= $this->Form->button(__('Save Payroll Data'),['title'=>'Save Payroll Data','class'=>'pull-right']) ?> -->
    <input type="button" value="Save Payroll Data" class="mptlsave btn btn-success pull-right" id="mptlsave"/>
    </div>
    <?= $this->Form->end() ?>

</div>


<?php $this->start('scriptBotton'); ?>
<script>
var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';


	var paycomponentdata=[];
	var paycomponentarr=<?php echo $paycomponentarr ?>;
	$.each(paycomponentarr, function(key, value) {
    	paycomponentdata.push({'id':value['id'], "text":value['name'], "canoverride":value['can_override']});
	});
	// console.log(paycomponentdata);
	var paycomponentgroupdata=[];
	var paycomponentgrouparr=<?php echo $paycomponentgrouparr ?>;
	$.each(paycomponentgrouparr, function(key, value) {
    	paycomponentgroupdata.push({'id':key, "text":value});
	});



$(function () {

	//save btn onclick
	$('#mptlsave').click(function(){
    	//get input value
		var emp = $("#empdatabiographies-id").val();

		var pccount = $('.componentclass').length;
		var pcgcount = $('.groupclass').length;

		if (emp=="" || emp==null){
			sweet_alert("Please select a Employee.");
			return false;
		}

		if(pccount<1 && pcgcount<1){

			sweet_alert("Please add a pay Component/Pay Component Group for the particular Employee.");
			return false;
		}else{
			if(pccount>0){

				var paycomp=$("#paycomponent1").val();
    			var paycompval=$("#paycomponentvalue1").val();
    			var startdate = $("#startdate1").val();
				var enddate = $("#enddate1").val();

				if(paycomp!="" && paycomp!=null && startdate!="" && startdate!=null && enddate!="" && enddate!=null){

					$.ajax({
        				type: "POST",
      					url: '/PayrollData/addData',
        				data: 'employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponentgroup=0&paycomponent='+paycomp+'&paycomponentvalue='+paycompval+'&type=1',
        				success : function(data) {
        					if(data=="success"){
    							window.location='/payroll-data';
    						}else{
    							sweet_alert("Error adding Pay Component.");
								return false;
    						}

        				},error: function(data) {
       						sweet_alert("Error adding Pay Component.");
							return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error adding Pay Component.");
								return false;
        					}
      					}

        			});

				}else{
					sweet_alert("Pay Component/Start/End Date missing.");
					return false;
				}
			}else if(pcgcount>0){

    			var paycompgroup=$("#pcgroup1").val();
    			if(paycompgroup!="" && paycompgroup!=null){

				var pcgcolcount=$('.pcgcol').length;
    			for (i = 1; i <= pcgcolcount; i++) {

    				var paycomp=$("#paycomp"+i).attr('name');console.log(paycomp);
    				var paycompval=$("#paycomponentvalue"+i).val();
    				var startdate = $("#startdate"+i).val();
					var enddate = $("#enddate"+i).val();

				if(startdate!="" && startdate!=null && enddate!="" && enddate!=null){

					$.ajax({
        				type: "POST",
      					url: '/PayrollData/addData',
        				indexValue: i,
        				data: 'employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponentgroup='+paycompgroup+'&paycomponent='+paycomp+'&paycomponentvalue='+paycompval+'&type=2',
        				success : function(data) {
        					if(data=="success"){
        						if(this.indexValue==pcgcolcount || this.indexValue>pcgcolcount){
    								window.location='/payroll-data';
    							}
    						}else{
    							sweet_alert("Error adding Pay Component Group.");
								return false;
    						}

        				},error: function(data) {
       						sweet_alert("Error adding Pay Component Group.");
							return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error adding Pay Component Group.");
								return false;
        					}
      					}

        			});

				}else{
					sweet_alert("Start/End Date missing.");
					return false;
				}
				}
			}else{
				sweet_alert("Pay Component Group missing.");
				return false;
			}
		}
		}
  });

    	$('.maindiv').on('change', 'input.pcomp', function() {

			for(var i = 0; i < paycomponentdata.length; i++) {
        		if(paycomponentdata[i]['id'] == $(this).val()) {
            		(paycomponentdata[i]['canoverride']=="1") ? $('#paycomponentvalue1').prop("disabled","true")  : $('#paycomponentvalue1').removeAttr("disabled");
        		}
    		}
		});


	$('.maindiv').on('change', 'input.pcgroup', function() {

		$(this).parent().closest('div .groupclass').find('.pcgcol').remove();
		$(this).parent().closest('div .groupclass').find('.spacecol').remove();

		var selectedCtrl = $(this);

		var selectedVal = this.value;
		$.get('/PayrollData/getPayComponentGroupData?pcgid='+selectedVal, function(result) {
			var obj = JSON.parse(result);
				for(t = 0; t < obj.length; t++){
    				var numItems = $('.pcgcol').length+1;
    				//disable pay component value textbox if can override set to no
    				var visibletype="";
    				(obj[t]['can_override']=="1")?visibletype=" disabled " : visibletype="";//console.log(obj[t]['can_override']);
    				if(t>0){
    					selectedCtrl.closest(".groupclass").append("<div class='col-sm-4 spacecol'></div>");
    				}
    				selectedCtrl.closest(".groupclass").append("<div class='pcgcol'><div class='col-sm-2 groupcol'><div class='form-group'><label>Pay Component:</label><input id='paycomp"+numItems+"' disabled type='text' value='"+obj[t]['name']+"' class='form-control paycompnt' name='"+obj[t]['id']+"'></div></div><div class='col-sm-2'><label>Pay Component Value:</label><input class='form-control'"+visibletype+"  id='paycomponentvalue"+numItems+"'/></div><div class='col-sm-2 groupcol'><div class='form-group'><label>Start Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='startdate"+numItems+"' type='text' class='form-control mptldp'></div></div></div><div class='col-sm-2 groupcol'><div class='form-group'><label>End Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='enddate"+numItems+"' type='text' class='form-control mptldp'></div></div></div></div>");


			//date picker
			if(userdf==1){
				$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
			}else{
				$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
			}
    			}
    	});
	});

	$("#btnAddControl").click(function (event) {

		var emp = $("#empdatabiographies-id").val();
		if(emp!="" && emp!=null){
			$(".pcaddbtn").hide();$(".pcgroupaddbtn").hide();

			event.preventDefault();
			var numItems = $('.componentclass').length+1;
			$(".maindiv").append("<div class='componentclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><div class='input-group'><div class='input-group-btn'><a class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='text' class='pcomp form-control' id='paycomponent"+numItems+"'/></div></div><div class='col-sm-4'><label>Pay Component Value:</label><input class='pcval form-control'  id='paycomponentvalue"+numItems+"'/></div><div class='col-sm-4 groupcol'><div class='form-group'><label>Start Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='startdate"+numItems+"' type='text' class='form-control mptldp'></div></div></div><div class='col-sm-4 groupcol'><div class='form-group'><label>End Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='enddate"+numItems+"' type='text' class='form-control mptldp'></div></div></div></div></div>");
				$('.pcomp').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata
				});


				//date picker
			if(userdf==1){
				$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
			}else{
				$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
			}

		}else{
			sweet_alert("Please select an Employee.");
   			return false;
		}

	});

	$("#btnAddPCG").click(function (event) {

		var emp = $("#empdatabiographies-id").val();
		if(emp!="" && emp!=null){
			event.preventDefault();

			$(".pcaddbtn").hide();$(".pcgroupaddbtn").hide();

			var numItems = $('.groupclass').length+1;
			$(".maindiv").append("<div class='clearfix'><div class='groupclass' id='groupDiv"+numItems+"'><div class='col-sm-4'><div class='form-group'><label>Pay Component Group:</label><div class='input-group'><div class='input-group-btn'><a class='groupdelete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div><input type='text' class='pcgroup form-control' id='pcgroup"+numItems+"'/></div></div></div></div></div>");
				$('.pcgroup').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata
				});


		}else{
			sweet_alert("Please select an Employee.");
   			return false;
		}

	});

	//delete btn onclick
	$('.maindiv').on('click', 'a.groupdelete', function() {
		$(".pcaddbtn").show();$(".pcgroupaddbtn").show();

		var selectedcontrol=$(this);
		sweet_confirmdelete("MayHaw","Are you sure you want to delete the Pay Component Group?", function(){selectedcontrol.parent().closest('div .groupclass').remove(); return true;});
	});

	$('.maindiv').on('click', 'a.compdelete', function() {
		$(".pcaddbtn").show();$(".pcgroupaddbtn").show();

		var selectedcontrol=$(this);
		sweet_confirmdelete("MayHaw","Are you sure you want to delete the Pay Component?", function(){selectedcontrol.parent().closest('div .componentclass').remove(); return true;});
	});

});

</script>
<?php $this->end(); ?>
