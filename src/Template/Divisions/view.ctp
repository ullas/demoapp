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
            <th><?= __('Name') ?></th>
            <td><?= h($division->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($division->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Division') ?></th>
            <td><?= h($division->parent_division) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($division->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($division->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Head Of Unit') ?></th>
            <td><?= $this->Number->format($division->head_of_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($division->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($division->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $division->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
