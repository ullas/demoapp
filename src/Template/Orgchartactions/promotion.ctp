<?= $this->element('templateelmnt'); ?>

<div class="box box-success box-solid">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Promotion</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- form start -->
    <?= $this->Form->create($jobInfo, array('role' => 'form'))
    ?>
    <div class="box-body">
        <?php

			// echo $this->Form->input('position');
			echo $this->Form->input('business_unit',['class'=>'select2','empty' => true]);
            echo $this->Form->input('division',['class'=>'select2','empty' => true]);
            echo $this->Form->input('department',['class'=>'select2','empty' => true]);
            echo $this->Form->input('cost_center',['class'=>'select2','empty' => true]);
			echo $this->Form->input('manager_category');
			echo $this->Form->input('job_code');
            echo $this->Form->input('job_title');
			echo $this->Form->input('employee_class');
            echo $this->Form->input('pay_grade',['class'=>'select2','empty' => true]);
			echo $this->Form->input('position_id',['class'=>'select2','empty' => true]);
			
        ?>
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Save Changes'),['class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
	