<section class="content-header">
  <h1>
    Holiday Calendar
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
            <th><?= __('Calendar') ?></th>
            <td><?= h($holidayCalendar->calendar) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($holidayCalendar->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($holidayCalendar->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($holidayCalendar->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From') ?></th>
            <td><?= h($holidayCalendar->valid_from) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid To') ?></th>
            <td><?= h($holidayCalendar->valid_to) ?></td>
        </tr>
    </table>
</div></div></section>
