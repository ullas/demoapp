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
    top: 70px;
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

  
<div class="stepwizard col-md-offset-3 jumbotron">
    <div class="stepwizard-row setup-panel">
    	
    	<!-- $extdiv='<div class="stepwizard-step">';
    	$btntype="success";
		$ptype="success";
		$icontype='<i class="icon fa fa-check-square"></i> ';
    	for ($t = 1; $t < 7; $t++) {
    		
			if($t==$wid){$btntype="info";$ptype="aqua";$icontype='<i class="icon fa fa-edit"></i> ';}
    			
			switch ($t) {
    			case "1":
					$cont= '<div class="stepwizard-step lt"><a href="../LegalEntities/addwizard" type="button" class="btn btn-'.$btntype.' btn-circle"><i class="fa fa-bank"></i></a>
								<dt class="text-'.$ptype.'">'.$icontype.'Legal Entity</dt>';
				break;
				case "2":
					$cont= '<div class="stepwizard-step"><a href="../BusinessUnits/addwizard" type="button" class="btn btn-'.$btntype.' btn-circle"><i class="fa fa-cube"></i></a>
								<dt class="text-'.$ptype.'">'.$icontype.'Business Unit</dt>';
				break;
				case "3":
       				$cont= '<div class="stepwizard-step"><a href="../Departments/addwizard" type="button" class="btn btn-'.$btntype.' btn-circle"><i class="fa fa-cubes"></i></a>
       							<dt class="text-'.$ptype.'">'.$icontype.'Department</dt>';
				break;
				case "4":
					$cont= '<div class="stepwizard-step"><a href="../CostCentres/addwizard" type="button" class="btn btn-'.$btntype.' btn-circle"><i class="fa fa-creative-commons"></i></a>
								<dt class="text-'.$ptype.'">'.$icontype.'Cost Centre</dt>';
				break;
				case "5":
       				$cont= '<div class="stepwizard-step"><a href="../Positions/addwizard" type="button" class="btn btn-'.$btntype.' btn-circle"><i class="fa fa-tasks"></i></a>
       							<dt class="text-'.$ptype.'">'.$icontype.'Position</dt>';
				break;
				case "6":
       				$cont= '<div class="stepwizard-step rt"><a href="../Employees/addwizard" type="button" class="btn btn-'.$btntype.' btn-circle"><i class="fa fa-user-plus"></i></a>
       							<dt class="text-'.$ptype.'">'.$icontype.'Employee</dt>';
				break;
			}


			echo $cont.'</div>';
			if($t==$wid){$btntype="default";$ptype="muted";$icontype='<i class="icon fa fa-ban"></i> ';}
    	} -->
		
		
		
		
      <div class="stepwizard-step lt">
      	<?php  
      	
       	if($counts['legalentity'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-bank"></i></a>';
      		echo '<dt class="text-success"><i class="icon fa fa-check-square"></i> Legal Entity</dt>';
      	}else{
      		$btntype="default";$disabledstr='disabled="disabled"';$texttype='';
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
      		echo '<dt class="text-success"><i class="icon fa fa-check-square"></i> Business Unit</dt>';
      	}else{
      		$btntype="default";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="BusinessUnit"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-cube"></i></a>';
      		echo '<dd'.$texttype.'>Business Unit</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step">
      	<?php
      	if($counts['department'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-cubes"></i></a>';
      		echo '<dt class="text-success"><i class="icon fa fa-check-square"></i> Department</dt>';
      	}else{
      		$btntype="default";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="Department"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-cubes"></i></a>';
      		echo '<dd'.$texttype.'>Department</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step">
      	<?php  
       	if($counts['costcenter'] > 0){	
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-creative-commons"></i></a>';
      		echo '<dt class="text-success"><i class="icon fa fa-check-square"></i> Cost Center</dt>';
      	}else{
      		$btntype="default";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="CostCenter"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-creative-commons"></i></a>';
      		echo '<dd'.$texttype.'>Cost Center</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step">
      	<?php if($counts['position'] > 0){
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-tasks"></i></a>';
      		echo '<dt class="text-success"><i class="icon fa fa-check-square"></i> Position</dt>';
      	}else{
      		$btntype="default";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="Position"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-tasks"></i></a>';
      		echo '<dd'.$texttype.'>Position</dd>';
      	}
        ?>
      </div>
      <div class="stepwizard-step rt">
      	<?php if($counts['employee'] > 0){
      		echo '<a type="button" class="btn btn-success btn-circle"><i class="fa fa-user-plus"></i></a>';
      		echo '<dt class="text-success"><i class="icon fa fa-check-square"></i> Employee Biography</dt>';
      	}else{
      		$btntype="default";$disabledstr='disabled="disabled"';$texttype='';
      		if($wcontent=="Employee"){$btntype="primary";$disabledstr='';$texttype=' class="text-blue"';}
      		echo '<a type="button" class="btn btn-'.$btntype.' btn-circle" '.$disabledstr.'><i class="fa fa-user-plus"></i></a>';
      		echo '<dd'.$texttype.'>Employee Biography</dd>';
      	}
        ?>
      </div>
      
      
    </div>
</div>


