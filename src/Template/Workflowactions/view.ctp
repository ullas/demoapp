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

          	echo $this->Form->input('name',['disabled'=>true]);
            echo $this->Form->input('displayname',['disabled'=>true]);
            echo $this->Form->input('position_id', ['options' => $positions, 'empty' => true,'disabled'=>true]);
            echo $this->Form->input('stepid',['disabled'=>true]);
            echo $this->Form->input('nextactionid',['disabled'=>true]);
            echo $this->Form->input('onfailureactionid',['disabled'=>true]);
            echo $this->Form->input('failuretime',['disabled'=>true]);
            echo $this->Form->input('failureskip',['disabled'=>true]);
            
		?>
		</div>
		<!-- <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Holiday'), ['action' => 'edit', $holiday['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div> -->
	<?= $this->Form->end() ?>
</div>
	  
	  
	