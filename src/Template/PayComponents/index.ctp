<section class="content-header">
  <h1>
    Pay Component
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'PayComponents', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('pay_component_type') ?></th>
                <th><?= $this->Paginator->sort('is_earning') ?></th>
                <th><?= $this->Paginator->sort('currency') ?></th>
                <th><?= $this->Paginator->sort('pay_component_value') ?></th>
                <!-- <th><?= $this->Paginator->sort('recurring') ?></th>
                <th><?= $this->Paginator->sort('base_pay_component_group') ?></th>
                <th><?= $this->Paginator->sort('tax_treatment') ?></th>
                <th><?= $this->Paginator->sort('can_override') ?></th>
                <th><?= $this->Paginator->sort('self_service_description') ?></th>
                <th><?= $this->Paginator->sort('display_on_self_service') ?></th>
                <th><?= $this->Paginator->sort('used_for_comp_planning') ?></th>
                <th><?= $this->Paginator->sort('target') ?></th>
                <th><?= $this->Paginator->sort('is_relevant_for_advance_payment') ?></th>
                <th><?= $this->Paginator->sort('max_fraction_digits') ?></th>
                <th><?= $this->Paginator->sort('unit_of_measure') ?></th>
                <th><?= $this->Paginator->sort('rate') ?></th>
                <th><?= $this->Paginator->sort('number') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th> -->
                <th><?= $this->Paginator->sort('frequency_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payComponents as $payComponent): ?>
            <tr>
                <td><?= $this->Number->format($payComponent->id) ?></td>
                <td><?= h($payComponent->name) ?></td>
                <td><?= h($payComponent->description) ?></td>
                <td><?= h($payComponent->status) ?></td>
                <td><?= h($payComponent->start_date) ?></td>
                <td><?= h($payComponent->end_date) ?></td>
                <td><?= h($payComponent->pay_component_type) ?></td>
                <td><?= h($payComponent->is_earning) ?></td>
                <td><?= h($payComponent->currency) ?></td>
                <td><?= $this->Number->format($payComponent->pay_component_value) ?></td>
                <!-- <td><?= h($payComponent->recurring) ?></td>
                <td><?= h($payComponent->base_pay_component_group) ?></td>
                <td><?= h($payComponent->tax_treatment) ?></td>
                <td><?= h($payComponent->can_override) ?></td>
                <td><?= h($payComponent->self_service_description) ?></td>
                <td><?= h($payComponent->display_on_self_service) ?></td>
                <td><?= h($payComponent->used_for_comp_planning) ?></td>
                <td><?= h($payComponent->target) ?></td>
                <td><?= h($payComponent->is_relevant_for_advance_payment) ?></td>
                <td><?= $this->Number->format($payComponent->max_fraction_digits) ?></td>
                <td><?= h($payComponent->unit_of_measure) ?></td>
                <td><?= $this->Number->format($payComponent->rate) ?></td>
                <td><?= $this->Number->format($payComponent->number) ?></td>
                <td><?= h($payComponent->external_code) ?></td> -->
                <td><?= $payComponent->has('frequency') ? $this->Html->link($payComponent->frequency->name, ['controller' => 'Frequencies', 'action' => 'view', $payComponent->frequency->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payComponent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payComponent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payComponent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payComponent->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table></div></div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
