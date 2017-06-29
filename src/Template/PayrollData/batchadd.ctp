<div class="box-body">
	<?= $this->Form->create($payrollData) ?>
	<div class="row">
		<div class="col-md-4">
	<?php
            echo $this->Form->input('paycomponent',['options'=>$payComponents,'class' => 'select2', 'empty' => true]);

        ?></div>
        <div class="col-md-4"><div class="form-group">
        	<div class="input-group" >
        		<input type="button" class="pcaddbtn btn btn-flat btn-success" id="btnAddPC" style="margin-top:25px;" value="Add" />
        	</div>
        </div></div>
     </div>
					<?= $this->Form->end() ?>
	<div style="height:500px;overflow-y:scroll;">
	
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
   				 
   				 
</div>