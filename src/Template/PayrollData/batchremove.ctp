<?= $this->element('templateelmnt'); ?>

<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Batch Remove</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    
<div class="col-md-12"><div class="form-group no-margin">
        	<div class="input-group">
        		<input type="button" class="selectallbtn btn btn-sm btn-instagram" id="dd" value="Select All" />
        	</div>
        </div></div>
        
    	<div class="box-body" style="height: 500px;overflow: auto;">
    		<?= $this->Form->create("ddd") ?>
        
    		<div style="margin-bottom:20px;">
    			<div class="box box-solid collapsed-box pg" style="margin-bottom:0px;">
    				
    			
        
    			<?php foreach ($paygrouplist as $vals) {
					echo '<div class="box-header">';
					echo '<input type="checkbox" class="paygroup_filter" id="paygroupcheck_'.$vals['parentid'].'"/>'.' '.'<b>'.$vals['parent'].'</b>';
					echo '</div>';
					// if(isset($vals['child'])){
						// echo "<div class='box-body no-padding'><ul class='nav nav-pills nav-stacked'>";
						// foreach ($vals['child'] as $childval) {
							// echo "<li><a class='emplist'><input type='checkbox' class='emp_filter' id='empcheck_".$childval['employee_id']."'/> ";
							// $empname = str_replace('"', '',$this->Country->get_empname($childval['employee_id']));
							// echo $empname ;
							// echo "</a> </li>";
						// }
						// echo "</ul></div>";
					// }
					}
					?>
    		</div></div>
    		
    		<div class="maindiv">
    		
    		<input type="hidden" id="empdatabiographies-id" value="0" />
    		
	<!-- <div class="col-md-4" style="min-height:0px;"><div class="form-group no-margin">
        	<div class="input-group">
        		<input type="button" class="pcremovebtn btn btn-flat btn-warning" id="btnRemoveControl" value="Remove Pay Component" />
        	</div>
        </div></div>

        <div class="col-md-4 pull-right"><div class="form-group no-margin">
        	<div class="input-group" >
        		<input type="button" class="pcgroupremovebtn btn btn-flat btn-warning" id="btnRemovePCG" value="Remove Pay Component Group" />
        	</div>
        </div></div> -->
        
        <div class="col-md-4">
			   <div class="form-group">
				<label class="control-label">Pay Component Type</label>
				<div class="input-group">
                  		<select class="select2" name="pay_component_type" id="pay-component-type">
        					<option></option>
  							<option value="1">Pay Component</option>
        					<option value="2">Pay Component Group</option>
      					</select>
      			</div>
              </div>
           </div>
           
        <?php echo $this->Form->input('paycomponent',['label' => 'Pay Component','options'=>$payComponents,'class'=>'select2','empty'=>true]); ?>
        
   			</div>	<?= $this->Form->end() ?> 
</div>
<div class="box-footer"> 
     <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
     <input type="button" value="Remove" class="mptlbatchremove btn btn-success pull-right" id="mptlbatchremove"/>
 </div>
</div>