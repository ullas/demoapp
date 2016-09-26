<section class="content-header">
  <h1>
    Cost Centre
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
            <td><?= h($costCentre->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($costCentre->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Cost Center') ?></th>
            <td><?= h($costCentre->parent_cost_center) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($costCentre->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($costCentre->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Center Manager') ?></th>
            <td><?= $this->Number->format($costCentre->cost_center_manager) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($costCentre->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($costCentre->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $costCentre->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
