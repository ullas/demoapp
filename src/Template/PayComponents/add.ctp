<style>
	.pctype .selection .select2-selection {
    	background-color: #337ab7;
	}
	.pctype .selection .select2-selection .select2-selection__rendered{
		color:#fff;
	}
</style>


<?= $this->element('templateelmnt'); ?>

<section class="content-header">
      <h1>
       Pay Component
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payComponent,['id'=>'addpcform']) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Pay Component Code']);
            echo $this->Form->input('name',['label' => 'Pay Component Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status',['class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
			      echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pay_component_type',['class'=>'select2','options' => array('Amount', 'Percentage'), 'empty' => 'Choose']);
            echo $this->Form->input('is_earning',['class'=>'select2','options' => array('Yes', 'No')]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('recurring');
            echo $this->Form->input('frequency_id', ['label' => 'Frequency','options' => $frequencies, 'empty' => true]);
            echo $this->Form->input('pay_component_group_id',['options' => $payComponentGroups,'label' => 'Pay Component Group','class'=>'select2', 'empty' => 'Choose']);
            ?>

			<div class="col-md-4">
			   <div class="form-group">
				<label class="control-label">Base Pay Component Type</label>
				<div class="input-group">
                  		<select class="select2" name="base_pay_component_type" id="base-pay-component-type">
        					<option></option>
  							<option value="1">Pay Component Group</option>
        					<option value="2">Pay Component</option>
      					</select>
      			</div>
              </div>
           </div>


           <div class="col-md-4">
           	<div class="form-group">
				<label class="control-label">Base Pay Component</label>
				<div class="input-group">
					<input class="form-control basepcgroup" name="base_pay_component_group" id="base-pay-component-group"/>
				</div>
             </div>
           </div>

			<?php
            // echo $this->Form->input('pay_component_group_id',['label' => 'Base Pay Component Group','class'=>'select2', 'empty' => 'Choose']);
            echo $this->Form->input('pay_component_value');
            echo $this->Form->input('tax_treatment',['class'=>'select2','options' => array('No Tax', 'Regular','Gross Up'), 'empty' => 'Choose']);
            echo $this->Form->input('can_override',['class'=>'select2','options' => array('Yes', 'No')]);
            echo $this->Form->input('self_service_description');
            echo $this->Form->input('display_on_self_service',['label' => 'Display on Self Service','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('used_for_comp_planning',['label' => 'Used for Comp Planning','class'=>'select2','options' => array('None' ,'Comp ',' Varpay',' Both'), 'empty' => 'Choose']);
            echo $this->Form->input('target');
            echo $this->Form->input('is_relevant_for_advance_payment',['label' => 'Relevant for Advance']);
            echo $this->Form->input('max_fraction_digits',['label' => 'Maximum Decimal Places']);
            echo $this->Form->input('unit_of_measure',['label' => 'Unit of Measure']);
            echo $this->Form->input('rate');
            echo $this->Form->input('number');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Pay Component'),['title'=>'Save Pay Component','class'=>'mptladd pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>


<?php $this->start('scriptBotton'); ?>
<script>
	var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;

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

	var pcgrouparr=<?php echo $pcGroups ?>;

	window.onload = function () {
    	 $('.basepcgroup').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata
		});
	}

    $(function () {
    	
    	//disable base pay component & type on page load
    	$("#base-pay-component-type").prop('disabled', true); 
    	$("#base-pay-component-group").prop('disabled', true);
    	$('#pay-component-type').on('change', function () {
			if(this.value=="1"){
				$("#base-pay-component-type").prop('disabled', false); 
    			$("#base-pay-component-group").prop('disabled', false);
			}else{
				$("#base-pay-component-type").prop('disabled', true); 
    			$("#base-pay-component-group").prop('disabled', true);
			}  	
  		});

    	$('.mptladd').click(function(e){
			
			var startdate = $("#start-date").val();
    		var enddate = $("#end-date").val();
    		if(startdate=="" || startdate==null || enddate=="" || enddate==null){
    			sweet_alert("Start/End Date missing.");
				return false;
    		}

			if(!(compareStartEndDate(startdate,enddate))){
    			sweet_alert("Please ensure that the End Date is greater than or equal to the Start Date.");
				return false;
    		}
    			
    		var paycomptype = $("#pay-component-type").val();
    		if(paycomptype=="1"){
    			var paycompval = $("#pay-component-value").val();
    			if(paycompval=="" || paycompval==null){
    				sweet_alert("Please enter pay component value.");
					return false;
    			}else if(paycompval<0 || paycompval>200){
    				sweet_alert("Pay component value should be in the range 0-200.");
					return false;
    			}
    		}



    		var canoverride = $("#can-override").val();
    		if(canoverride=="1"){
    			var paycompval = $("#pay-component-value").val();
    			if(paycompval=="" || paycompval==null){
    				sweet_alert("Please enter pay component value.");
					return false;
    			}
    		}

    		//check if pay component's start/ end date is in between pay component group's start-end date
    		var paycompgroup = $("#pay-component-group-id").val();
    		if(paycompgroup!="" && paycompgroup!=null){

    			var groupstartdate;var groupenddate;
    			$.each(pcgrouparr, function(key, value) {
    				if(value["id"]==paycompgroup){//return false;

    					if(value["start_date"].length>11){
							value["start_date"]=value["start_date"].substring(0 , 10);
						}
						if(value["end_date"].length>11){
							value["end_date"]=value["end_date"].substring(0 , 10);
						}

    					if(userdf==1){
								value["start_date"]=formattoymd(value["start_date"]);
								value["end_date"]=formattoymd(value["end_date"]);

							groupstartdate=convertdmytoymd(value["start_date"]).trim();
							groupenddate=convertdmytoymd(value["end_date"]).trim();
						}else{
							groupstartdate=value["start_date"].replace(/-/g, "/");
    						groupenddate=value["end_date"].replace(/-/g, "/");
						}

						if(startdate!="" && startdate!=null && groupstartdate!="" && groupstartdate!=null && enddate!="" && enddate!=null && groupenddate!="" && groupenddate!=null){
							// console.log(processDate(startdate)+"--"+processDate(groupstartdate)+"--" +processDate(enddate)+"--"+processDate(groupenddate));
							if((processDate(startdate)>processDate(groupenddate))){
    							sweet_alert("Start Date exceeds the end date of the selected Pay Component Group.");
								return false;
    						}
                else if ((processDate(enddate)<processDate(groupstartdate))) {
                  sweet_alert("End Date is older than the Start Date of the selected Pay Component Group.");
								return false;
                }
								else{
    							document.getElementById("addpcform").submit();
    						}
    					}else{
    						document.getElementById("addpcform").submit();
    					}
    				}
    			});
    		}else{
    			document.getElementById("addpcform").submit();
    		}
			return false;
    	});


    	$( "#base-pay-component-type" ).change(function() {
    		var selectedVal = this.value;
    		if(selectedVal=="2"){
    			 $('.basepcgroup').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata
				});
    		}else{
    			$('.basepcgroup').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata
				});
    		}

		});
    });

    function formattoymd(inputDate) {
    	var date = new Date(inputDate);
    	if (!isNaN(date.getTime())) {
        	var day = date.getDate().toString();
        	var month = (date.getMonth() + 1).toString();
        	// Months use 0 index.

        	return date.getFullYear()  + '/' +
        	(month[1] ? month : '0' + month[0]) + '/' +
        	(day[1] ? day : '0' + day[0]) ;
    	}
	}
    function processDate(date){
   		var parts = date.split("/");
   		return new Date(parts[2], parts[1] - 1, parts[0]);
	}
    function convertdmytoymd(inputDate) {

		var datearray = inputDate.split("/");

		return datearray[2].trim() + '/' + datearray[1].trim() + '/' + datearray[0].trim();
	}

   </script>
<?php $this->end(); ?>
