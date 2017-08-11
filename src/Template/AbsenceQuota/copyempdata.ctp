
<?= $this->element('templateelmnt'); ?>

<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Duplicate Absence Quota</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>

    <?= $this->Form->create($absenceQuotum) ?>
    <div class="box-body maindiv" style="min-height: 350px;">

    	<fieldset>
        <?php
            echo $this->Form->input('oldempid',['label'=>'Id','type'=>'hidden','value'=>$absenceQuotum['employee_id']]);
            echo $this->Form->input('employee_id',['options'=>$excludingemployees,'label'=>'Employee','class' => 'select2', 'empty' => true]);
        ?>

         <div class="col-md-4"><div class="form-group">
        	<div class="input-group">
        		<input type="button" class="mptlcopy btn btn-flat btn-success"  style="margin-top:25px;" value="Duplicate" />
        	</div>
        </div></div>

    </fieldset>

	 <div class="box-body" >


	<?php foreach ($content as $vals) { ?>
          <div class="panel box box-default  mptlpanel" id="<?php echo $vals['empid']; ?>">
           
            <div id="mainpanel<?php echo $vals['empid'];  ?>" class="emppanel"><!-- <div class="box-body"> -->

            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Time Type</th>
                <th>Frequency</th>
                <th>Quota</th>
                <th>Leave Balance</th>
                <th>Next Expiry</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($vals['absentchild'] as $childval) { ?>

            <tr>
                <td><?php echo  $childval['timetype']; ?></td>
                <td><?php echo  $childval['frequency']; ?></td>
                <td><?php echo  $childval['quota']; ?></td>
                <td><?php echo  $childval['balance']; ?></td>
                <td><?php echo  $childval['nxtexpiry']; ?></td>               
            </tr>

			<?php } ?>
			</tbody>
    	</table>

			

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    <?php } ?>
</div>

    </div>

    
    <?= $this->Form->end() ?>

</div>
