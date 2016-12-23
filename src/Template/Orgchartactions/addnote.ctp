<?= $this->element('templateelmnt'); ?>
<div class="box box-success box-solid">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Add Note</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
        <!-- form start -->
        <?= $this->Form->create($note) ?>
          <div class="box-body">
          <?php

            echo $this->Form->input('title');
            echo $this->Form->input('created_at',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('modified_at',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('visibleto',['class'=>'select2','options' => array('Admin', 'All'), 'empty' => true]);
			echo $this->Form->input('description');
            
		?>
		</div>
		<div class="box-footer">
            <?= $this->Form->button(__('Save Changes'),['class'=>'pull-right']) ?>
        </div>
        <?= $this->Form->end() ?>
	  </div>
	</div>
  </div>
</section>