<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Address
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($address) ?>
    <fieldset>
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
            echo $this->Form->input('emp_data_biographies_id', ['class'=>'select2','options' => $empDataBiographies, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Address'),['title'=>'Save Address','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
