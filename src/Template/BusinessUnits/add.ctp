<?= $this->element('templateelmnt'); ?>
<style>
label.mandatory:after {
    content: ' *';
    color: #ff5a4d;
    display: inline;
}
</style>
<section class="content-header">
      <h1>
        Business Unit
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
		<?= $this->Form->create($businessUnit) ?>
    <fieldset>
        <?php            
        	echo $this->Form->input('external_code',['label'=>['text'=>'External Code','class'=>'mandatory']]);
            echo $this->Form->input('name',['label'=>['text'=>'Name','class'=>'mandatory']]);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('head_of_unit');
        ?>
    </fieldset>
    <div class="box-footer">
    	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    	<?= $this->Form->button(__('Save Business Unit'),['class'=>'pull-right']) ?>
  </div>
    <?= $this->Form->end() ?>
</div></div></section>

