<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Department
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($department) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Department Code']);
            echo $this->Form->input('name',['label' => 'Department Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status']);
            echo $this->Form->input('effective_start_date', ['label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date',['label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('parent_department');
            echo $this->Form->input('head_of_unit',['label' => 'Head of Department']);
            echo $this->Form->input('cost_center_id', ['options' => $costCentres, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Department'),['title'=>'Save Department','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
