<section class="content-header">
  <h1>
    Customer
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Customers', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>
            	
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-xs-12">
  <div class="box box-primary">
  	<div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('contactno') ?></th>
                <th><?= $this->Paginator->sort('noofusers') ?></th>
                <th><?= $this->Paginator->sort('expirydate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->name) ?></td>
                <td><?= h($customer->contactno) ?></td>
                <td><?= h($customer->noofusers) ?></td>
                <td><?= h($customer->expirydate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   </div></div>
   </div>
</div>
</section>
    
