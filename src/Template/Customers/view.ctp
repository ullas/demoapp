<section class="content-header">
  <h1>
    Customer
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
    <table class="table table-hover">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Contactno') ?></th>
            <td><?= h($customer->contactno) ?></td>
        </tr>
        <tr>
            <th><?= __('Noofusers') ?></th>
            <td><?= h($customer->noofusers) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Expirydate') ?></th>
            <td><?= h($customer->expirydate) ?></td>
        </tr>
    </table>
   
    
</div></div></section>
