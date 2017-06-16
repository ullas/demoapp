<section class="content-header">
  <h1>
    Payroll Data
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
  
    <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section>


<section class="content" id="contentsection">
	
	
	<?php foreach ($content as $vals) { ?>
	<div class="col-md-12">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $vals['empname']; ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus text-gray"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                <td> <?php echo  "<a href='PayrollData/edit/".$childval['id'] ."' class='editlink fa fa-pencil p3 text-aqua'></a>"; ?> 
                	
                	<?php echo  '<form name="formdelete" id="formdelete' .$childval['id']. '" method="post" action="/PayrollData/delete/'.$childval['id'].'" style="display:none;" >
                    <input type="hidden" name="_method" value="POST"></form>
                    <a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete the pay component # '.$childval['id'].'?&quot; , 
                    function(){ document.getElementById(&quot;formdelete'.$childval['id'].'&quot;).submit(); })
                    event.returnValue = false; return false;" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';   ?>
                	
                </td>
            </tr>
          

			<?php } ?>  
			</tbody>
    	</table>

			<h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;"> PAY COMPONENT GROUPS </h4>
            	
            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Pay Component Group</th>
                <th>Pay Component</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pay Component Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($vals['pcgroupchild'] as $childval) { ?>
              
              

            <tr>
                <td><?php echo  $childval['paycomponentgroup']; ?></td>
                <td><?php echo  $childval['paycomponent']; ?></td>
                <td><?php echo  $childval['startdate']; ?></td>
                <td><?php echo  $childval['enddate']; ?></td>
                <td><?php echo  $childval['paycomponentvalue']; ?></td>
                <td><?php echo  "<a href='PayrollData/edit/".$childval['id'] ."' class='editlink fa fa-pencil p3 text-aqua'></a>"; ?> 

						<?php echo  '<form name="formdelete" id="formdelete' .$childval['id']. '" method="post" action="/PayrollData/delete/'.$childval['id'].'" style="display:none;" >
                    	<input type="hidden" name="_method" value="POST"></form>
                    	<a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete the pay component # '.$childval['id'].'?&quot; , 
                    	function(){ document.getElementById(&quot;formdelete'.$childval['id'].'&quot;).submit(); })
                    	event.returnValue = false; return false;" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';   ?>
                </td>
            </tr>
          

			<?php } ?>  
			</tbody>
    	</table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
    <?php } ?>    
        
</section>
















<?php $this->start('scriptIndexBottom'); ?>
<script>
	$(function () {
	
	$("[data-widget='collapse']").click(function() {
		// $(".box").addClass("collapsed-box");
		
		// $(".box-body").hide();
	});
    
    });

</script>
<?php $this->end(); ?>
