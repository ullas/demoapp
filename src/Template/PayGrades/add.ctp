<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
       Pay Grade
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payGrade) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Pay Grade Code']);
            echo $this->Form->input('name',['label' => 'Pay Grade Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('status');
			      echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pay_grade_level');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Pay Grade'),['title'=>'Save Pay Grade','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
