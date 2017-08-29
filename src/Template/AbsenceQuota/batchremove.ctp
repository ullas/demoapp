<?= $this->element('templateelmnt'); ?>
<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Remove Absence Quota in batch</h3>

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
    		
    		<div style="margin-bottom:20px;height:250px;overflow: auto;">
    				
    			
        
    			<?php foreach ($paygrouplist as $vals) {
    				echo '<div class="box box-solid collapsed-box pg" style="margin-bottom:0px;">';
					echo '<div class="box-header">';
					echo '<input type="checkbox" class="paygroup_filter" id="paygroupcheck_'.$vals['parentid'].'"/>'.' '.'<b>'.$vals['parent'].'</b>';
					echo '<div class="box-tools" style="background:#dbdde0;"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div>';
					
					if(isset($vals['child'])){
						echo "<div class='box-body no-padding'><ul class='nav nav-pills nav-stacked'>";
						foreach ($vals['child'] as $childval) {
							echo "<li><a class='emplist'>";
							$empname = str_replace('"', '',$this->Country->get_empname($childval['employee_id']));
							echo $empname ;
							echo "</a> </li>";
						}
						echo "</ul></div>";
					}
					echo '</div>';
					}
					?>
    		</div>
    		
    		 <div class="box-body" >


    
            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Time Type</th>
                <th>Frequency</th>
                <th>Quota</th>
                <th>Leave Balance</th>
                <th>Next Expiry</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($content as $childval) { ?>



            <tr>
                <td><?php echo  $childval['timetype']; ?></td>
                <td><?php echo  $childval['frequency']; ?></td>
                <td><?php echo  $childval['quota']; ?></td>
                <td><?php echo  $childval['balance']; ?></td>
                <td><?php echo  $childval['nxtexpiry']; ?></td>
                <td><?php echo  '<a href="#" onclick="batchdeletequota('.$childval['time_type_id'].');" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';   ?></td>
            </tr>


			<?php } ?>
			</tbody>
    	</table>


</div> 
</div>
<div class="box-footer"> 
     <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
     <input type="button" value="Add" class="mptlbatchadd btn btn-success pull-right" id="mptlbatchadd"/>
 </div>
</div>