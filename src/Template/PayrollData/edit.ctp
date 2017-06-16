<?= $this->element('templateelmnt'); ?>
<style>
	.pcaddbtn, .pcgroupaddbtn{
		margin-top:25px;
	}
</style>
<section class="content-header">
      <h1>
        Payroll Data
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body maindiv">
    <?= $this->Form->create($payrollData) ?>
    <fieldset>
        <?php
            echo $this->Form->input('empdatabiographies_id',['options'=>$empDataBiographies,'label'=>'Employee','class' => 'select2', 'empty' => true]);
			
			if($payrollData['pay_component_type']=="2"){
				echo $this->Form->input('paycomponentgroup',['options'=>$payComponentGroups,'class' => 'select2', 'empty' => true]);
			}
			echo $this->Form->input('paycomponent',['options'=>$payComponents,'class' => 'select2', 'empty' => true]);
			echo $this->Form->input('pay_component_value');
			
			echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			
        ?>
      
        
    </fieldset></div>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Payroll Data'),['title'=>'Update Payroll Data','class'=>'pull-right']) ?>
    <!-- <input type="button" value="Update Payroll Data" class="mptlupdate btn btn-success pull-right" id="mptlupdate"/> -->
    </div>
    <?= $this->Form->end() ?>
</div></section>
