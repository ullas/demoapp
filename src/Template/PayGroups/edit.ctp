<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Pay Group
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payGroup) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
			echo $this->Form->input('effective_start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('earliest_change_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('payment_frequency');
            echo $this->Form->input('primary_contactid');
            echo $this->Form->input('primary_contact_email',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-envelope"></i></div>']]);
            echo $this->Form->input('primary_contact_name');
            echo $this->Form->input('secondary_contactid');
            echo $this->Form->input('secondary_contact_email',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-envelope"></i></div>']]);
            echo $this->Form->input('secondary_contact_name');
            echo $this->Form->input('weeks_in_pay_period');
            echo $this->Form->input('data_delimiter');
            echo $this->Form->input('decimal_point');
            echo $this->Form->input('lag');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Paygroup'),['title'=>'Save Paygroup','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
</div></section>
