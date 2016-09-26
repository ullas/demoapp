<section class="content-header">
  <h1>
    Division
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
            <th><?= __('Description') ?></th>
            <td><?= h($picklist->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($picklist->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($picklist->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($picklist->id) ?></td>
        </tr>
    </table>
</div></div></section>
