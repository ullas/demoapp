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
    		</div>
    		
    		<div style="height:250px;overflow: auto;margin-top:20px;">
    		<?php foreach ($paycompcontent as $vals) { ?>
          <div class="panel box box-default mptlpanel no-border">
            
            <!-- /.box-header -->
            <div id="mainpanel" class="emppanel "><!-- <div class="box-body"> -->
            	<?php  if (isset($vals['pcchild']) && ($vals['pcchild']!=null)) { ?>
            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;"> PAY COMPONENTS </h4>

            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Pay Component</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pay Component Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($vals['pcchild'] as $childval) { ?>



            <tr>
                <td><?php echo  $childval['paycomponent']; ?></td>
                <td><?php echo  $childval['startdate']; ?></td>
                <td><?php echo  $childval['enddate']; ?></td>
                <td><?php echo  $childval['paycomponentvalue']; ?></td>
                <td> 

                	<?php echo  '<a href="#" onclick="batchdeletepaycomponent('.$childval['paycomponentid'].');" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';   ?>

                </td>
            </tr>


			<?php } ?>
			</tbody>
    	</table>
    	 <?php } ?>
    	 
			<?php  if (isset($vals['pcgroupchild']) && ($vals['pcgroupchild']!=null)) { ?>
           
			<h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;"> PAY COMPONENT GROUPS </h4>
            <div id="accordion">
            <?php  foreach ($vals['pcgroupchild'] as $childval) { ?>
              <!-- <h4><?php echo $childval['groupname'];  ?></h4>	 -->


         <div class="box box-default" style="margin-bottom:0px;">
           <div class="box-header">
             <!-- <h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion<?php echo $vals['empid']; ?>" href="#panel<?php echo $childval['groupid'];  ?>" aria-expanded="false" class="collapsed"> -->
             	<?php echo $childval['groupname'];  ?>
             	<!-- </a></h4> -->

           		<?php echo  '<a href="#" onclick="batchdeletepaycomponentgroup('.$childval['groupid'].');" class="deletelink fa fa-trash text-red pull-right" style= "padding:3px"></a>';   ?>


           </div>
           
           <div id="panel<?php echo $childval['groupid'];  ?>" >

	<table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<!-- <th>Pay Component Group</th> -->
                <th>Pay Component</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pay Component Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

              <?php  foreach ($childval['grouplist'] as $groupval) { ?>

            <tr>
                <!-- <td><?php echo  $groupval['paycomponentgroup']; ?></td> -->
                <td><?php echo  $groupval['paycomponent']; ?></td>
                <td><?php echo  $groupval['startdate']; ?></td>
                <td><?php echo  $groupval['enddate']; ?></td>
                <td><?php echo  $groupval['paycomponentvalue']; ?></td>
                
            </tr>
          <?php } ?>


			</tbody>
    	</table>

   		</div>
   		<?php } ?> 
   		</div></div>
		<?php } ?>  

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    <?php } ?>
    	</div>
    		
</div>

</div>