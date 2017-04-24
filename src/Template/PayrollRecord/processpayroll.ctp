<?= $this->element('templateelmnt'); ?>


    <section class="content-header">
      <h1>
        Payroll
        <small>Process</small>
      </h1>
    </section>
<section class="content">
<div class="box box-default"><div class="box-body">	
	
	
	<div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">
                        Process Payroll by PayGroup
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                    <div class="box-body">
                       <fieldset>
			<?php
					
					echo $this->Form->input('pay_group_id', ['label' => 'Select Paygroup','options'=>$payGroups, 'class'=>'select2', 'empty' => true]);
			?>
			<div class="clearfix"></div>
			
			<div class="col-md-4">
				<div class="form-group">
                  <label>Employees</label>
                  <select id="emplist" size="20" class="form-control" >
                    
                  </select>
                </div>
           </div>
           
           <div class="clearfix"></div>
           
           <div class="col-md-4">
           		<div class="form-group checkbox">
                      <label>
                        <input type="checkbox"> Select all Employees
                      </label>
            	</div>
       		</div>
                
    	</fieldset>
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                        Process Payroll By Legal Entity
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                      <?php
					
					echo $this->Form->input('legal_entity_id', ['label' => 'Select Legal Entity', 'class'=>'select2', 'empty' => true]);
			?>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              
	
    <?= $this->Form->create($payrollRecord) ?>
   </div>
	<div class="box-footer">
    	<?= $this->Form->button(__('Run Payroll'),['title'=>'Run Payroll','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></section>

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