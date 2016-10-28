<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Address
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
  	<?= $this->Form->create($address, array('role' => 'form')) ?>
    <?php
            echo $this->Form->input('address_no',['disabled' => true]);
            echo $this->Form->input('address1',['disabled' => true]);
            echo $this->Form->input('address2',['disabled' => true]);
            echo $this->Form->input('address3',['disabled' => true]);
            echo $this->Form->input('address4',['disabled' => true]);
            echo $this->Form->input('address5',['disabled' => true]);
            echo $this->Form->input('address6',['disabled' => true]);
            echo $this->Form->input('address7',['disabled' => true]);
            echo $this->Form->input('address8',['disabled' => true]);
            echo $this->Form->input('zip_code',['disabled' => true]);
            echo $this->Form->input('city',['disabled' => true]);
            echo $this->Form->input('county',['disabled' => true]);
            echo $this->Form->input('state',['disabled' => true]);
            echo $this->Form->input('emp_data_biographies_id', ['class'=>'select2','options' => $empDataBiographies, 'empty' => true,'disabled' => true]);
        ?>
        <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Address'), ['action' => 'edit', $address['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
