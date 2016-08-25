<section class="content-header">
  <h1>
    Time Type
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
            <th><?= __('Country') ?></th>
            <td><?= h($timeType->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Classification') ?></th>
            <td><?= h($timeType->classification) ?></td>
        </tr>
        <tr>
            <th><?= __('Workflow') ?></th>
            <td><?= h($timeType->workflow) ?></td>
        </tr>
        <tr>
            <th><?= __('Calc Base') ?></th>
            <td><?= h($timeType->calc_base) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Acc Type') ?></th>
            <td><?= h($timeType->time_acc_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Take Rule') ?></th>
            <td><?= h($timeType->take_rule) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($timeType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timeType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= $this->Number->format($timeType->unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Fractions Days') ?></th>
            <td><?= $this->Number->format($timeType->perm_fractions_days) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Fractions Hours') ?></th>
            <td><?= $this->Number->format($timeType->perm_fractions_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Flex Req Allow') ?></th>
            <td><?= $timeType->flex_req_allow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
