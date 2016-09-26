<section class="content-header">
  <h1>
    Pay Component Group
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
            <td><?= h($payComponentGroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payComponentGroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= h($payComponentGroup->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Show On Comp Ui') ?></th>
            <td><?= h($payComponentGroup->show_on_comp_ui) ?></td>
        </tr>
        <tr>
            <th><?= __('Use For Comparatio Calc') ?></th>
            <td><?= h($payComponentGroup->use_for_comparatio_calc) ?></td>
        </tr>
        <tr>
            <th><?= __('Use For Range Penetration') ?></th>
            <td><?= h($payComponentGroup->use_for_range_penetration) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payComponentGroup->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payComponentGroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($payComponentGroup->sort_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($payComponentGroup->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($payComponentGroup->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $payComponentGroup->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('System Defined') ?></th>
            <td><?= $payComponentGroup->system_defined ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
