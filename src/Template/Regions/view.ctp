<section class="content-header">
  <h1>
    Region
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
            <td><?= h($region->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($region->description) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($region->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($region->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($region->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($region->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $region->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
