<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Add Payroll Data in batch</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>

    	<div class="box-body" style="height: 500px;overflow: auto;">
    		<div style="margin-bottom:20px;">
    			<?php foreach ($paygrouplist as $vals) {
					echo '<div class="box box-solid collapsed-box pg" style="margin-bottom:0px;"><div class="box-header">';
					echo '<input type="checkbox" class="paygroup_filter" id="paygroupcheck_'.$vals['parentid'].'"/>'.' '.'<b>'.$vals['parent'].'</b>';
					echo '<div class="box-tools" style="background:#dbdde0;"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div>';
					if(isset($vals['child'])){
						echo "<div class='box-body no-padding'><ul class='nav nav-pills nav-stacked'>";
						foreach ($vals['child'] as $childval) {
							echo "<li><a class='emplist'><input type='checkbox' class='emp_filter' id='empcheck_".$childval['employee_id']."'/> ";
							$empname = str_replace('"', '',$this->Country->get_empname($childval['employee_id']));
							echo $empname ;
							echo "</a> </li>";
						}
						echo "</ul></div></div>";
					}
					}
					?>
    		</div>
    		
    		<div class="maindiv">
    		
    		<input type="hidden" id="empdatabiographies-id" value="0" />
    		
	<div class="col-md-4" style="min-height:0px;"><div class="form-group no-margin">
        	<div class="input-group">
        		<input type="button" class="pcaddbtn btn btn-flat btn-info" id="btnAddControl" value="Add Pay Component" />
        	</div>
        </div></div>

        <div class="col-md-4 pull-right"><div class="form-group no-margin">
        	<div class="input-group" >
        		<input type="button" class="pcgroupaddbtn btn btn-flat btn-info" id="btnAddPCG" value="Add Pay Component Group" />
        	</div>
        </div></div>
   			</div>	 
</div>

</div>