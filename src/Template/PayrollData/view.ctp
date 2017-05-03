<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Payroll Data
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
  <div class="box box-primary"><div class="box-body maindiv">
    <?= $this->Form->create($payrollData, array('role' => 'form')) ?>
    <?php 
            echo $this->Form->input('empdatabiographies_id',['options'=>$empDataBiographies,'label'=>'Employee','class' => 'select2', 'empty' => true,'disabled' => true]);
			echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            
        ?></div>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Payroll Data'), ['action' => 'edit', $payrollData['empdatabiographies_id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
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
	var paycomponentsarr='<?php echo $payComps ?>';
	var pcobj = JSON.parse(paycomponentsarr);

	for (i = 1; i <= pcobj.length; i++) {
		$(".maindiv").append("<div class='componentclass' id='contentDiv"+i+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><input disabled type='text' class='pcomp form-control' id='paycomponent"+i+"' value='"+ pcobj[i-1]['pay_component_id'] +"'/></div><div class='col-sm-4'><label>Pay Component Value:</label><input disabled class='form-control'  id='paycomponentvalue"+i+"' value='"+ pcobj[i-1]['pay_component_value'] +"'/></div></div></div>");
	}
	
	
	
	var paycomponentgroupsarr='<?php echo $payCompGroups ?>';
	var pcgobj = JSON.parse(paycomponentgroupsarr);

	for (i = 1; i <= pcgobj.length; i++) {
		$(".maindiv").append("<div class='groupclass' id='groupDiv"+i+"'><div class='col-sm-4'><div class='form-group'><label>Pay Component Group:</label><input disabled type='text' class='pcgroup form-control' value='"+ pcgobj[i-1]['pay_component_id'] +"' id='pcgroup"+i+"'/></div></div></div></div>");
		
		var resArr = pcgobj[i-1]['pay_component_value'].toString().split('|');
		
		var selectedCtrl = $("#groupDiv"+i);

		for (t = 0; t < resArr.length-1; t++) {
			var valArr = resArr[t].toString().split('^');
			if(t>0){
    			selectedCtrl.closest(".groupclass").append("<div class='col-sm-4'></div>");
    		}
			selectedCtrl.append("<div class='pcgcol'><div class='col-sm-4 groupcol'><div class='form-group'><label>Pay Component:</label><input id='paycomp' disabled type='text' value='"+ paycomponentarr[valArr[0]] +"' class='form-control paycompnt'></div></div><div class='col-sm-4 groupcol'><div class='form-group'><label>Pay Component Value:</label><input disabled id='paycompval' type='text' class='form-control paycompntval' value='"+ valArr[1] +"'></div></div></div>");
    			
		}
		
	}
	
	
	
});

</script>
<?php $this->end(); ?>   