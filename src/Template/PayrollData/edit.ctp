<?= $this->element('templateelmnt'); ?>
<style>
	.pcaddbtn, .pcgroupaddbtn{
		margin-top:25px;
	}
</style>
<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Edit PayrollData</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <?= $this->Form->create($payrollData) ?>
    <div class="box-body">
    <fieldset>
        <?php
            echo $this->Form->input('empdatabiographies_id',['options'=>$empDataBiographies,'label'=>'Employee','class' => 'select2', 'empty' => true, 'disabled'=>true]);
			
			if($payrollData['pay_component_type']=="2"){
				echo $this->Form->input('paycomponentgroup',['options'=>$payComponentGroups,'class' => 'select2', 'empty' => true, 'disabled'=>true]);
				echo $this->Form->input('paycomponent',['options'=>$payComponents,'class' => 'select2', 'empty' => true, 'disabled'=>true]);
			}else{
				echo $this->Form->input('paycomponent',['options'=>$payComponents,'class' => 'select2', 'empty' => true]);
			}
			echo $this->Form->input('pay_component_value');
			
			echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			
        ?>
      
        
    </fieldset></div>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Payroll Data'),['title'=>'Update Payroll Data','class'=>'mptlupdate pull-right']) ?>
    <!-- <input type="button" value="Update Payroll Data" class="mptlupdate btn btn-success pull-right" id="mptlupdate"/> -->
    </div>
    <?= $this->Form->end() ?>


</div>
