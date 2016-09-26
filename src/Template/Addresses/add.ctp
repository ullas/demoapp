<section class="content-header">
      <h1>
        Address
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($address) ?>
    <fieldset>
        <legend><?= __('Add Address') ?></legend>
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
            echo $this->Form->input('emp_data_biographies_id', ['options' => $empDataBiographies, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
