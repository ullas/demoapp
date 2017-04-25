<?= $this->element('templateelmnt'); ?>


    <section class="content-header">
      <h1>
        Payroll
        <small>Process</small>
      </h1>
    </section>
<section class="content">

	
	<div class="row">
		
		<div class="col-md-6">
			 <div class="box box-primary">
			 	
			 	<div class="box-header with-border">
	            	<input type="button" value="Process All" class="btn btn-primary"/>
            	</div>
            
				<div class="box-body">
				 <?php foreach ($paygrouplist as $vals) {
			
					echo '<div class="box box-solid collapsed-box" style="margin-bottom:0px;"><div class="box-header">';
					echo '<input type="checkbox">'.' '.'<b>'.$vals['parent'].'</b>';
					echo '<div class="box-tools" style="background:#dbdde0;"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div>';
			
					if(isset($vals['child'])){
						echo "<div class='box-body no-padding'><ul class='nav nav-pills nav-stacked'>";
						foreach ($vals['child'] as $childval) {
							echo "<li><a><i class='fa fa-circle-o text-light-blue'></i> ";
							
							$empname = str_replace('"', '',$this->Country->get_empname($childval['employee_id']));
							echo $empname ;
							
							echo "<input type='button' value='Status' class='btn btn-sm btn-success pull-right p3' style='margin-left:5px;'/>";
							echo " <input type='button' value='Process' class='btn btn-sm btn-warning pull-right p3 dd'/></a> </li>";
						}
						echo "</ul></div></div>";
					}
			
					} 
		
					?>
   				 </div>
			</div>
		</div>
		
		
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
              		<i class="fa fa-money"></i>
			    	<h3 class="box-title">Payroll Progress</h3>
            	</div>
				<div class="box-body">
					<p>Payroll Progress</p>
					<div class="progress progress-sm active">
                		<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                  			<span class="sr-only">20% Complete</span>
                		</div>
              		</div>
            
				</div>
			</div>
		</div>
		
	</div>
	
	
	
              
          
	
   
</section>	
<?php $this->start('scriptIndexBottom'); ?>
<script>
 $(function () {

	var action='<?php echo $this->request->params['action'] ?>';
		if(action=="processpayroll"){
			var atag = $('a[href="/PayrollRecord/processpayroll"]');
			atag.parent().addClass('active');
			atag = $('a[href="/PayrollRecord"]');
			atag.parent().removeClass('active');

		}
	});
		</script>
 <?php $this->end(); ?>