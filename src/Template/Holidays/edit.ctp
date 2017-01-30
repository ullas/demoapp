<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Holidays
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($holiday) ?>
    <fieldset>
        <?php
            echo $this->Form->input('holiday_class');
            echo $this->Form->input('name');
            echo $this->Form->input('date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('holiday_code');
        ?>
    </fieldset>
</div>
<div class="box-footer">
    	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    	<?= $this->Form->button(__('Update'),['title'=>'Update','class'=>'pull-right']) ?> 
	</div>
   </div></section>
