<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Frequency
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($frequency) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Frequency Code']);
            echo $this->Form->input('name',['label' => 'Frequency Name']);
            echo $this->Form->input('startday',['label' => 'Start Day','class'=>'select2','options' => ['1' => 'Sunday', '2' => 'Monday','3' => 'Tuesday','4' => 'Wednesday','5' => 'Thursday','6' => 'Friday','7' => 'Saturday'], 'empty' => 'Choose']);
            echo $this->Form->input('startdate',['label' => 'Start Date']);
			echo $this->Form->input('description');
            echo $this->Form->input('annualization_factor');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Frequency'),['title'=>'Save Frequency','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
