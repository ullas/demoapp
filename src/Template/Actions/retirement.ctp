<?= $this->element('templateelmnt'); ?>
<div class="box box-success box-solid">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Retirement</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- form start -->
    <?= $this->Form->create($employmentInfo, array('role' => 'form')) ?>
    <div class="box-body">
        <?php

			echo $this->Form->input('end_date',['value' => !empty($employmentInfo->end_date) ? $employmentInfo->end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('pay_roll_end_date',['value' => !empty($employmentInfo->pay_roll_end_date) ? $employmentInfo->pay_roll_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('last_date_worked',['value' => !empty($employmentInfo->last_date_worked) ? $employmentInfo->last_date_worked->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('stock_end_date',['value' => !empty($employmentInfo->stock_end_date) ? $employmentInfo->stock_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('salary_end_date',['value' => !empty($employmentInfo->salary_end_date) ? $employmentInfo->salary_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('benefits_end_date',['value' => !empty($employmentInfo->benefits_end_date) ? $employmentInfo->benefits_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('bonus_pay_expiration_date',['value' => !empty($employmentInfo->bonus_pay_expiration_date) ? $employmentInfo->bonus_pay_expiration_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);

        ?>
    </div>
    <div class="box-footer">
        <?= $this->Form->button(__('Save Changes'),['class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
	