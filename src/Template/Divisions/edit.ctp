<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Division
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($division) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Division Code']);
            echo $this->Form->input('name',['label' => 'Division Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status']);
            echo $this->Form->input('effective_start_date', ['label' => 'Start Date','value' => !empty($division->effective_start_date) ? $division->effective_start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['label' => 'End Date','value' => !empty($division->effective_end_date) ? $division->effective_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('parent_division');
            echo $this->Form->input('head_of_unit',['label' => 'Head of Division']);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Division'),['title'=>'Save Division','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
