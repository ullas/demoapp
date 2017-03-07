<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Pay Component Group
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payComponentGroup) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code');
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status',['class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('show_on_comp_ui',['label'=>'Display on Comp UI','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_comparatio_calc',['label'=>'Use for Comparatio Calculation','class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('use_for_range_penetration',['class'=>'select2','options' => array('Yes', 'No'), 'empty' => 'Choose']);
            echo $this->Form->input('sort_order');
            echo $this->Form->input('system_defined');
            
        ?>
    </fieldset>
   <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save PayComponentGroup'),['title'=>'Save PayComponentGroup','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>


