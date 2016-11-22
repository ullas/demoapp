<?= $this->element('templateelmnt'); ?>

<div class="box box-success box-solid">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Address Change</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- form start -->
    <?= $this->Form->create($address, ['id'=>'actionform'])
    ?>
    <div class="box-body">
        <?php

			echo $this->Form->input('address_no');
            echo $this->Form->input('address1');
            echo $this->Form->input('address2');
            echo $this->Form->input('address3');
            echo $this->Form->input('address4');
            echo $this->Form->input('address5');
            echo $this->Form->input('address6');
            echo $this->Form->input('address7');
            echo $this->Form->input('address8');
            echo $this->Form->input('zip_code');
            echo $this->Form->input('city');
            echo $this->Form->input('county');
            echo $this->Form->input('state');
			

        ?>
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Save Changes'),['class'=>'pull-right'])
        ?>
    </div>
    <?= $this->Form->end()
    ?>
</div>
	