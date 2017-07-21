<?= $this->element('templateelmnt'); ?>
<div class="box box-success box-solid">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Holidays</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
        <!-- form start -->
        <?= $this->Form->create($holiday) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('holiday_code');
            echo $this->Form->input('holiday_class', ['options' => array('Half day', 'Full day'),'class'=>'select2', 'empty' => true]);
            echo $this->Form->input('name',['label' => 'Name of Holiday']);
            echo $this->Form->input('date', ['value' => !empty($holiday->date) ? $holiday->date->format($mptldateformat) : '','label' => 'Date of the Holiday','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            //echo $this->Form->input('holiday_calendar_id',['disabled'=>true]);

		?>
		</div>
		<div class="box-footer">
    <!-- <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?> -->
    <?= $this->Form->button(__('Update Holidays'),['title'=>'Update Holidays','class'=>'pull-right']) ?>
</div>
	<?= $this->Form->end() ?>
</div>
