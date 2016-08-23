<section class="content-header">
  <h1>
    Emp data Biography
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'EmpDataBiographies', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th><?= $this->Paginator->sort('country_of_birth') ?></th>
                <th><?= $this->Paginator->sort('region_of_birth') ?></th>
                <th><?= $this->Paginator->sort('place_of_birth') ?></th>
                <th><?= $this->Paginator->sort('birth_name') ?></th>
                <th><?= $this->Paginator->sort('date_of_death') ?></th>
                <th><?= $this->Paginator->sort('person_id_external') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empDataBiographies as $empDataBiography): ?>
            <tr>
                <td><?= $this->Number->format($empDataBiography->id) ?></td>
                <td><?= h($empDataBiography->date_of_birth) ?></td>
                <td><?= h($empDataBiography->country_of_birth) ?></td>
                <td><?= h($empDataBiography->region_of_birth) ?></td>
                <td><?= h($empDataBiography->place_of_birth) ?></td>
                <td><?= h($empDataBiography->birth_name) ?></td>
                <td><?= h($empDataBiography->date_of_death) ?></td>
                <td><?= h($empDataBiography->person_id_external) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $empDataBiography->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $empDataBiography->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $empDataBiography->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empDataBiography->id)]) ?>
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
