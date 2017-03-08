<style>
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;color:#333;
    te
}
.stepwizard-row:before {
    top: 25px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 4px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
	/*color:#FFFFFF;*/
    width: 50px;
    height: 50px;
    text-align: center;
    padding: 4px 0;
    font-size: 30px;
    line-height: 1.428571429;
    border-radius: 25px;
}
.lt{
	text-align: left;
}
.rt{
	text-align: right;
}	
</style>
<div class="margin no-print">
      <div class="callout callout-warning">
        <i class="fa fa-info-circle"></i> To begin, please fill out the following forms.
      </div>
    </div>
     
<div class="stepwizard col-md-offset-3" style="background: #ecf0f5;">
    <div class="stepwizard-row setup-panel">
		
		
		
      <div class="stepwizard-step lt">
      	<?php  
      	
       	if($counts['legalentity'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-bank"></i></a>';
      		echo '<dd class="text-success"><i class="icon fa fa-check-square"></i> Legal Entity</dt>';
      	}else{
      		$btntype="danger";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="LegalEntity"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-bank"></i></a>';
      		echo '<dd'.$texttype.'>Legal Entity</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step">
      	<?php  
       	if($counts['businessunit'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-cube"></i></a>';
      		echo '<dd class="text-success"><i class="icon fa fa-check-square"></i> Business Unit</dt>';
      	}else{
      		$btntype="danger";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="BusinessUnit"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-cube"></i></a>';
      		echo '<dd'.$texttype.'>Business Unit</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step">
      	<?php
      	if($counts['division'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-database"></i></a>';
      		echo '<dd class="text-success"><i class="icon fa fa-check-square"></i> Division</dt>';
      	}else{
      		$btntype="danger";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="Division"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-database"></i></a>';
      		echo '<dd'.$texttype.'>Division</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step">
      	<?php  
       	if($counts['costcenter'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-creative-commons"></i></a>';
      		echo '<dt class="text-success"><i class="icon fa fa-check-square"></i> Cost Center</dt>';
      	}else{
      		$btntype="danger";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="CostCenter"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-creative-commons"></i></a>';
      		echo '<dd'.$texttype.'>Cost Center</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step">
      	<?php
      	if($counts['department'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-cubes"></i></a>';
      		echo '<dd class="text-success"><i class="icon fa fa-check-square"></i> Department</dt>';
      	}else{
      		$btntype="danger";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="Department"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-cubes"></i></a>';
      		echo '<dd'.$texttype.'>Department</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step rt">
      	<?php if($counts['position'] > 0){
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-tasks"></i></a>';
      		echo '<dd class="text-success"><i class="icon fa fa-check-square"></i> Position</dt>';
      	}else{
      		$btntype="danger";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="Position"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-tasks"></i></a>';
      		echo '<dd'.$texttype.'>Position</dd>';
      	}
        ?>
      </div>
      
      
      
    </div>
</div>


