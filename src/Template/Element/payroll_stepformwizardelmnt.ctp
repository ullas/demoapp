<style>

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

/*newlyadded colorlib*/
.wizard_horizontal ul.wizard_steps {
    display: table;
    list-style: none;
    position: relative;
    width: 100%;
    margin: 0 0 20px;
}
.wizard_horizontal ul.wizard_steps li {
    display: table-cell;
    text-align: center;
}
.wizard_horizontal ul.wizard_steps li a, .wizard_horizontal ul.wizard_steps li:hover {
    display: block;
    position: relative;
    -moz-opacity: 1;
    filter: alpha(opacity=100);
    opacity: 1;
    color: #666;
}
.wizard_horizontal ul.wizard_steps li a .step_no {
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 100px;
    display: block;
    margin: 0 auto 5px;
    font-size: 16px;
    text-align: center;
    position: relative;
    z-index: 5;
}
.danger .step_no{
    background: #34495E;
    color: #fff;
}
.wizard_horizontal ul.wizard_steps li a.done .step_no, .wizard_horizontal ul.wizard_steps li a.done:before {
    background: #1ABB9C;
    color: #fff;
}
.wizard_horizontal ul.wizard_steps li a:before {
    content: "";
    position: absolute;
    height: 4px;
    background: #3498DB;
    top: 20px;
    width: 100%;
    z-index: 4;
    left: 0;
}
.wizard_horizontal ul.wizard_steps li a, .wizard_horizontal ul.wizard_steps li:hover {
    display: block;
    position: relative;
    -moz-opacity: 1;
    filter: alpha(opacity=100);
    opacity: 1;
    color: #666;
}
.wizard_horizontal ul.wizard_steps li:first-child a:before {
    left: 50%;
}
.wizard_horizontal ul.wizard_steps li:last-child a:before {
    right: 50%;
    width: 50%;
    left: auto;
}
.step_no, .wizard_horizontal ul.wizard_steps li a.danger:before {
    background: #34495E;
    color: #fff;
}
.selected .step_no{
    background: #3498DB;
    color: #fff;
}

</style>


<div class="margin no-print">
      <div class="callout callout-warning">
        <i class="fa fa-info-circle"></i> To begin, please fill out the following forms.
      </div>
</div>
     
<div class="stepwizard wizard_horizontal">
	<ul class="wizard_steps anchor no-padding">
		
		
		
      	<?php  
      	
      		$btntype="danger";
      		if($wcontent=="Paygroup"){$btntype="selected";}
      		echo '<li><a class="'.$btntype.'" isdone="1" rel="1"><span class="step_no fa fa-bank"></span><span class="step_descr">Paygroup<br><small>Step 1 description</small></span></a></li>';
     
        ?>
      	<?php  
       	if($counts['businessunit'] > 0){	
      		echo '<li><a class="done" isdone="1" rel="2"><span class="step_no fa fa-cube"></span><span class="step_descr">Business Unit<br><small>Step 2 description</small></span></a></li>';
      	}else{
      		$btntype="danger";
      		if($wcontent=="BusinessUnit"){$btntype="selected";}
      		echo '<li><a class="'.$btntype.'" isdone="1" rel="2"><span class="step_no fa fa-cube"></span><span class="step_descr">Business Unit<br><small>Step 2 description</small></span></a></li>';
      	}
        ?>
      	<?php
      	if($counts['division'] > 0){	
      		echo '<li><a class="done" isdone="1" rel="3"><span class="step_no fa fa-database"></span><span class="step_descr">Division<br><small>Step 3 description</small></span></a></li>';
      	}else{
      		$btntype="danger";
      		if($wcontent=="Division"){$btntype="selected";}
      		echo '<li><a class="'.$btntype.'" isdone="1" rel="3"><span class="step_no fa fa-database"></span><span class="step_descr">Division<br><small>Step 3 description</small></span></a></li>';
      	}
        ?>
      	<?php  
       	if($counts['costcenter'] > 0){	
      		echo '<li><a class="done" isdone="1" rel="4"><span class="step_no fa fa-creative-commons"></span><span class="step_descr">Cost Center<br><small>Step 4 description</small></span></a></li>';
      	}else{
      		$btntype="danger";
      		if($wcontent=="CostCenter"){$btntype="selected";}
      		echo '<li><a class="'.$btntype.'" isdone="1" rel="4"><span class="step_no fa fa-creative-commons"></span><span class="step_descr">Cost Center<br><small>Step 4 description</small></span></a></li>';
      	}
        ?>
      	<?php
      	if($counts['department'] > 0){	
      		echo '<li><a class="done" isdone="1" rel="5"><span class="step_no fa fa-cubes"></span><span class="step_descr">Department<br><small>Step 5 description</small></span></a></li>';
      	}else{
      		$btntype="danger";
      		if($wcontent=="Department"){$btntype="selected";}
      		echo '<li><a class="'.$btntype.'" isdone="1" rel="5"><span class="step_no fa fa-cubes"></span><span class="step_descr">Department<br><small>Step 5 description</small></span></a></li>';
      	}
        ?>
      	<?php if($counts['position'] > 0){
      		echo '<li><a class="done" isdone="1" rel="6"><span class="step_no fa fa-tasks"></span><span class="step_descr">Position<br><small>Step 6 description</small></span></a></li>';
      	}else{
      		$btntype="danger";
      		if($wcontent=="Position"){$btntype="selected";}
      		echo '<li><a class="'.$btntype.'" isdone="1" rel="6"><span class="step_no fa fa-tasks"></span><span class="step_descr">Position<br><small>Step 6 description</small></span></a></li>';
      	}
        ?>
      
      </ul>
      
</div>


