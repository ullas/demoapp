
<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Pay Component
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payComponent) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Pay Component Code']);
            echo $this->Form->input('name',['label' => 'Pay Component Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status',['class'=>'select2','options' => ['Active' => 'Active', 'Inactive' => 'Inactive'], 'empty' => 'Choose']);
			      echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pay_component_type',['class'=>'select2','options' => array('Amount', 'Percentage'), 'empty' => 'Choose']);
            echo $this->Form->input('is_earning',['class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
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
            // echo $this->Form->input('base_pay_component_group',['options' => $payComponents,'label' => 'Base Pay Component','class'=>'select2', 'empty' => 'Choose']);
			echo $this->Form->input('pay_component_value');
            echo $this->Form->input('tax_treatment',['class'=>'select2','options' => array('No Tax', 'Regular','Gross Up'), 'empty' => 'Choose']);
            echo $this->Form->input('can_override',['class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
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
    <?= $this->Form->button(__('Update Pay Component'),['title'=>'Update Pay Component','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>


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
		 var bpct='<?php echo $payComponent['base_pay_component_type'] ?>';
		
		 var pcgdata=[];
		 pcgdata=paycomponentgroupdata;
    	 if(bpct=="2"){
    	 	pcgdata=paycomponentdata;
    	 }
    	 $('.basepcgroup').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: pcgdata
		});
	}
	
    $(function () {
    	
    	 var bpct='<?php echo $payComponent['base_pay_component_type'] ?>';
    	 $("#base-pay-component-type").val(bpct);
    	 
    	 var bpcg='<?php echo $payComponent['base_pay_component_group'] ?>';
    	 $("#base-pay-component-group").val(bpcg);
    	 
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
   </script>
<?php $this->end(); ?> 
