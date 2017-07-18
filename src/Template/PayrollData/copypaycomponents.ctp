
<?= $this->element('templateelmnt'); ?>

<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Duplicate Payroll Data</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>

    <?= $this->Form->create($payrollData) ?>
    <div class="box-body maindiv" style="min-height: 350px;">

    	<fieldset>
        <?php
            echo $this->Form->input('oldempid',['label'=>'Id','type'=>'hidden','value'=>$payrollData['empdatabiographies_id']]);
            echo $this->Form->input('empdatabiographies_id',['options'=>$excludingempDataBiographies,'label'=>'Employee','class' => 'select2', 'empty' => true]);
        ?>

         <div class="col-md-4"><div class="form-group">
        	<div class="input-group">
        		<input type="button" class="mptlcopy btn btn-flat btn-success"  style="margin-top:25px;" value="Duplicate" />
        	</div>
        </div></div>

    </fieldset>
    	<div style="height:250px;overflow: auto;margin-top:20px;">
    		<?php foreach ($paycompcontent as $vals) { ?>
          <div class="panel box box-default mptlpanel no-border" id="<?php echo $vals['empid']; ?>">
            <!-- <div class="box-header with-border"> -->
              <!-- <h3 class="box-title"><?php echo $vals['empname']; ?></h3> -->
              <!-- <small><?php echo "PayComponents: ".count($vals['pcchild']);echo ", Pay Component Groups: ".count($vals['pcgroupchild']);?></small> -->

              <!-- <div class="box-tools pull-right">
              	<a href="/PayrollData/addempdata/<?php echo $vals['empid']; ?>" class="open-Popup btn btn-xs btn-success" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add">Add Pay Components</a>

				<a href="/PayrollData/copypaycomponents/<?php echo $vals['empid']; ?>" class="open-Popup btn btn-xs btn-success" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:5px;" title="Add">Copy Pay Components</a>

              	<a data-toggle="collapse" data-parent="#contentsection" href="#mainpanel<?php echo $vals['empid'];  ?>" aria-expanded="false" class="collapsed">
              		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="more-less fa fa-square-o text-navy"></i>
                	</button>
                </a>


              </div> -->
              <!-- /.box-tools -->
            <!-- </div> -->
            <!-- /.box-header -->
            <div id="mainpanel<?php echo $vals['empid'];  ?>" class="emppanel "><!-- <div class="box-body"> -->
            	<?php  if (isset($vals['pcchild'])) { ?>
            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;"> PAY COMPONENTS </h4>

            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Pay Component</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pay Component Value</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($vals['pcchild'] as $childval) { ?>



            <tr>
                <td><?php echo  $childval['paycomponent']; ?></td>
                <td><?php echo  $childval['startdate']; ?></td>
                <td><?php echo  $childval['enddate']; ?></td>
                <td><?php echo  $childval['paycomponentvalue']; ?></td>

            </tr>


			<?php } ?>
			</tbody>
    	</table>
    	 <?php } ?>

			<?php  if (isset($vals['pcgroupchild']) && ($vals['pcgroupchild']!=null)) { ?>

			<h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;"> PAY COMPONENT GROUPS </h4>
            <div id="accordion<?php echo $vals['empid']; ?>">
            <?php  foreach ($vals['pcgroupchild'] as $childval) { ?>
              <!-- <h4><?php echo $childval['groupname'];  ?></h4>	 -->


         <div class="box box-default" style="margin-bottom:0px;">
           <div class="box-header">
             <!-- <h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion<?php echo $vals['empid']; ?>" href="#panel<?php echo $childval['groupid'];  ?>" aria-expanded="false" class="collapsed"> -->
             	<?php echo $childval['groupname'];  ?>
             	<!-- </a></h4> -->



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

    <!-- <div class="box-footer"> -->
    <!-- <?= $this->Form->button(__('Save Payroll Data'),['title'=>'Save Payroll Data','class'=>'pull-right']) ?> -->
    <!-- <input type="button" value="Copy Payroll Data" class="mptlcopy btn btn-success pull-right" id="mptlcopy"/> -->
    <!-- </div> -->
    <?= $this->Form->end() ?>

</div>
