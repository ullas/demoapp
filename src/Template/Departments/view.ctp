<section class="content-header">
  <h1>
    Department
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
            <td><?= h($department->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($department->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Department') ?></th>
            <td><?= h($department->parent_department) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($department->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Centre') ?></th>
            <td><?= $department->has('cost_centre') ? $this->Html->link($department->cost_centre->name, ['controller' => 'CostCentres', 'action' => 'view', $department->cost_centre->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($department->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Head Of Unit') ?></th>
            <td><?= $this->Number->format($department->head_of_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($department->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($department->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $department->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></</div></section>
