<?= $this->element('templateelmnt'); ?>
<div class="box box-success box-solid">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Transfer</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
        <!-- form start -->
        <?= $this->Form->create($jobInfo, array('role' => 'form')) ?>
          <div class="box-body">
          <?php

			echo $this->Form->input('business_unit');
            echo $this->Form->input('division');
            echo $this->Form->input('department');
            echo $this->Form->input('cost_center');
			echo $this->Form->input('manager_category');
			echo $this->Form->input('position');
			echo $this->Form->input('position_id');
			
		?>
		</div>
		<div class="box-footer">
            <?= $this->Form->button(__('Save Changes'),['class'=>'pull-right']) ?>
        </div>
        <?= $this->Form->end() ?>
</div>