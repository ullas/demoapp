<?= $this->element('templateelmnt'); ?>
<div class="box box-success box-solid">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Workflow Action</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
        <!-- form start -->
        <?= $this->Form->create($workflowaction) ?>
          <div class="box-body">
          <?php

            echo $this->Form->input('name');
            echo $this->Form->input('displayname');
            echo $this->Form->input('position_id', ['options' => $positions, 'empty' => true]);
            echo $this->Form->input('stepid');
            echo $this->Form->input('nextactionid');
            echo $this->Form->input('onfailureactionid');
            echo $this->Form->input('failuretime');
            echo $this->Form->input('failureskip');
            
		?>
		</div>
		<div class="box-footer">
    <!-- <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?> -->
    <?= $this->Form->button(__('Save workflow action'),['title'=>'Save workflow action','class'=>'pull-right']) ?> 
</div>
	<?= $this->Form->end() ?>
</div>
	  