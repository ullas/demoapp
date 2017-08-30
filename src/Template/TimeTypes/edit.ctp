<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Time Type
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($timeType) ?>
    <fieldset>
        <?php
            echo $this->Form->input('code',['label' => 'Time Type Code']);
            echo $this->Form->input('name',['label' => 'Time Type Name']);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('classification');
            echo $this->Form->input('unit',['class'=>'select2','options' => array('Hour(s)', 'Day(s)')]);

			if($timeType['unit']=="0"){
				echo $this->Form->input('perm_fractions_hours',['label'=>'Permitted Fractions for Unit Hours']);
				echo $this->Form->input('perm_fractions_days',['disabled'=>true,'class'=>'select2','options' => ['1' => 'Quarter of a Day', '2' => 'Half a Day','3'=>'3 Quarters of a Day','4'=>'Full Day'],'empty'=>'Choose','label'=>'Permitted Fractions for Unit Days']);
			}else if($timeType['unit']=="1"){
				echo $this->Form->input('perm_fractions_hours',['disabled'=>true,'label'=>'Permitted Fractions for Unit Hours']);
				echo $this->Form->input('perm_fractions_days',['class'=>'select2','options' => ['1' => 'Quarter of a Day', '2' => 'Half a Day','3'=>'3 Quarters of a Day','4'=>'Full Day'],'empty'=>'Choose','label'=>'Permitted Fractions for Unit Days']);
			}else{
				echo $this->Form->input('perm_fractions_hours',['disabled'=>true,'label'=>'Permitted Fractions for Unit Hours']);
				echo $this->Form->input('perm_fractions_days',['disabled'=>true,'class'=>'select2','options' => ['1' => 'Quarter of a Day', '2' => 'Half a Day','3'=>'3 Quarters of a Day','4'=>'Full Day'],'empty'=>'Choose','label'=>'Permitted Fractions for Unit Days']);
			}
	
            echo $this->Form->input('calc_base',['label' => 'Calculation Based On']);
			if($timeType['unit']=="0"){
            	echo $this->Form->input('time_account_type_id', ['options' => $timeacchours, 'empty' => true]);
			}else{
				echo $this->Form->input('time_account_type_id', ['options' => $timeaccdays, 'empty' => true]);
			}
			echo $this->Form->input('flex_req_allow',['label'=>'Flexible Requesting Allowed']);
            echo $this->Form->input('workflowrule_id',['label'=>'Workflow','class'=>'select2', 'empty' => 'Choose']);

        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update LeaveType'),['title'=>'Update LeaveType','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>

<?php $this->start('scriptBotton'); ?>
<script>
	var timeacchoursdata=[];
	var timeacchoursarr=<?php echo $timeacchoursarr ?>;
	$.each(timeacchoursarr, function(key, value) {
    	timeacchoursdata.push({'id':key, "text":value});
	});

	var timeaccdaysdata=[];
	var timeaccdaysarr=<?php echo $timeaccdaysarr ?>;
	$.each(timeaccdaysarr, function(key, value) {
    	timeaccdaysdata.push({'id':key, "text":value});
	});
	
    $(function () {
    	
    	//enable/disable Permitted Fractions for Unit
    	$('#unit').on('change', function () {
			$('#time-account-type-id').empty();
			if(this.value=="0"){
				$("#perm-fractions-hours").prop('disabled', false); 
    			$("#perm-fractions-days").prop('disabled', true);
    			$('#time-account-type-id').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: timeacchoursdata
				});
			}else{
				$("#perm-fractions-hours").prop('disabled', true); 
    			$("#perm-fractions-days").prop('disabled', false);
    			$('#time-account-type-id').select2({
    				width: '100%',allowClear: true,placeholder: "Select",data: timeaccdaysdata
				});
			}  	
  		});
  	});
  		
  	</script>
<?php $this->end(); ?>
