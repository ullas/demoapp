<section class="content-header">
  <h1>
    Calendar Assignments
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
            <td><?= h($calendarAssignment->calendar) ?></td>
        </tr>
        <tr>
            <th><?= __('Assignmentyear') ?></th>
            <td><?= h($calendarAssignment->assignmentyear) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $calendarAssignment->has('user') ? $this->Html->link($calendarAssignment->user->id, ['controller' => 'Users', 'action' => 'view', $calendarAssignment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Holiday') ?></th>
            <td><?= $calendarAssignment->has('holiday') ? $this->Html->link($calendarAssignment->holiday->name, ['controller' => 'Holidays', 'action' => 'view', $calendarAssignment->holiday->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($calendarAssignment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assignmentdate') ?></th>
            <td><?= h($calendarAssignment->assignmentdate) ?></td>
        </tr>
    </table>
</div></div></section>
