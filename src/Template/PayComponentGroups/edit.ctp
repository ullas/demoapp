<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Pay Component Group
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payComponentGroup,['id'=>'editpcgform']) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Pay Component Group Code']);
            echo $this->Form->input('name',['label' => 'Pay Component Group Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status',['class'=>'select2','options' => array('1'=>'Active','0'=> 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('show_on_comp_ui',['label'=>'Display on Comp UI','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_comparatio_calc',['label'=>'Use for Comparatio Calculation','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_range_penetration',['label'=>'Use for Range Penetration','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('sort_order');
            echo $this->Form->input('system_defined');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Pay Component Group'),['title'=>'Update Pay Component Group','class'=>'mptlupdate pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>

<?php $this->start('scriptBotton'); ?>
<script>

var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
var groupContentsarr=<?php echo $groupContents ?>;
console.log(groupContentsarr.length);

$(function () {
	$('.mptlupdate').click(function(e){
		
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
    	
    	if(userdf==1){
    		startdate=convertdmytoymd(startdate);
    		enddate=convertdmytoymd(enddate);
    	}
    	
    	$.each(groupContentsarr, function(key, value) {
    		if(value['start_date']!="" && value['start_date']!=null && value['end_date']!="" && value['end_date']!=null){
    			
    		if(value["start_date"].length>11){
				value["start_date"]=value["start_date"].substring(0 , 10);
				value["start_date"]=formattoymd(value["start_date"]);
			}
			if(value["end_date"].length>11){
				value["end_date"]=value["end_date"].substring(0 , 10);
				value["end_date"]=formattoymd(value["end_date"]);
			}
    	
    	// console.log(processDate(startdate)+"--"+processDate(value['start_date']));return false;
    		if(processDate(startdate)>processDate(value['start_date'])){
    			sweet_alert("Linked pay component '"+ value["name"]+"' has a start date("+ convertymdtodmy(value['start_date']) +") older than the given startdate("+$("#start-date").val()+")");
				return false;
    		}else if(processDate(enddate)<processDate(value['end_date'])){
    			sweet_alert("Linked pay component '"+ value["name"]+"' has a end date("+ convertymdtodmy(value['end_date']) +") higher than the given enddate("+$("#end-date").val()+")");
				return false;
    		}else{
    			if(groupContentsarr.length<=(key+1)){
    				document.getElementById("editpcgform").submit();
    			}
    		}
    		}else{
    			if(groupContentsarr.length<=(key+1)){
    				document.getElementById("editpcgform").submit();
    			}
    		}
    		
    	});
    	if(groupContentsarr.length<1){
    		document.getElementById("editpcgform").submit();
    	}
    	return false;
	});
});
	
	function convertdmytoymd(inputDate) {
		var datearray = inputDate.split("/");
		return datearray[2].trim() + '/' + datearray[1].trim() + '/' + datearray[0].trim();
	}
	function convertymdtodmy(inputDate) {
		var datearray = inputDate.split("/");
		return datearray[2].trim() + '/' + datearray[1].trim() + '/' + datearray[0].trim();
	}
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
   		return new Date(parts[0], parts[1] - 1, parts[2]);
	}
</script>
<?php $this->end(); ?>