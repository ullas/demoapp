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
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <div class="box box-primary"><div class="box-body">
      <?= $this->Form->create($payComponent, array('role' => 'form')) ?>
      <fieldset>
		<?php
    		    echo $this->Form->input('external_code',['label' => 'Pay Component Code','disabled' => true]);
            echo $this->Form->input('name',['label' => 'Pay Component Name','disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('status',['disabled' => true,'class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
			      echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('pay_component_type',['disabled' => true,'class'=>'select2','options' => array('Amount', 'Percentage'), 'empty' => 'Choose']);
            echo $this->Form->input('is_earning',['disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('pay_component_value',['disabled' => true]);
            echo $this->Form->input('frequency_id', ['label' => 'Frequency','options' => $frequencies, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('recurring',['disabled' => true]);
            ?>
			
			<div class="col-md-4">
				<label class="control-label">Base Pay Component</label>
				<div class="input-group">
					<input class="form-control basepcgroup" name="base_pay_component_group" id="base-pay-component-group" disabled/>
                	<div class="input-group-btn pctype" style="width:40%;font-size:14px;color:#fff;">
                  		<select class="select2" name="base_pay_component_type" id="base-pay-component-type" disabled>
        					<option value="1">Pay Component Group</option>
        					<option value="2">Pay Component</option>
      					</select>
                	</div>                
              </div>
           </div>
              
			<?php
			//echo $this->Form->input('pay_component_group_id',['label' => 'Base Pay Component Group','disabled' => true]);
            echo $this->Form->input('pay_component_group_id',['disabled' => true,'options' => $payComponentGroups,'label' => 'Pay Component Group','class'=>'select2', 'empty' => 'Choose']);
            echo $this->Form->input('tax_treatment',['disabled' => true,'class'=>'select2','options' => array('No Tax', 'Regular','Gross Up'), 'empty' => 'Choose']);
            echo $this->Form->input('can_override',['disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('self_service_description',['disabled' => true]);
            echo $this->Form->input('display_on_self_service',['label' => 'Display on Self Service','disabled' => true,'class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('used_for_comp_planning',['label' => 'Used for Comp Planning','disabled' => true,'class'=>'select2','options' => array('None' ,'Comp ',' Varpay',' Both'), 'empty' => 'Choose']);
            echo $this->Form->input('target',['disabled' => true]);
            echo $this->Form->input('is_relevant_for_advance_payment',['label' => 'Relevant for Advance','disabled' => true]);
            echo $this->Form->input('max_fraction_digits',['label' => 'Maximum Decimal Places','disabled' => true]);
            echo $this->Form->input('unit_of_measure',['label' => 'Unit of Measure','disabled' => true]);
            echo $this->Form->input('rate',['disabled' => true]);
            echo $this->Form->input('number',['disabled' => true]);
			?>
	</fieldset>
        </div><div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Pay Component'), ['action' => 'edit', $payComponent['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?></div></section>


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
    	 if(bpct=="2"){
    	 	pcgdata=paycomponentdata;
    	 }else{
    	 	pcgdata=paycomponentgroupdata;
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
    	 
    });
   </script>
<?php $this->end(); ?> 
