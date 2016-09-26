<section class="content-header">
  <h1>
    Emp data Biography
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
            <th><?= __('Country Of Birth') ?></th>
            <td><?= h($empDataBiography->country_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Region Of Birth') ?></th>
            <td><?= h($empDataBiography->region_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Place Of Birth') ?></th>
            <td><?= h($empDataBiography->place_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth Name') ?></th>
            <td><?= h($empDataBiography->birth_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Person Id External') ?></th>
            <td><?= h($empDataBiography->person_id_external) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($empDataBiography->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($empDataBiography->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Death') ?></th>
            <td><?= h($empDataBiography->date_of_death) ?></td>
        </tr>
    </table>
</div></div></section>
