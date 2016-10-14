<?php
use Cake\Utility\Inflector;

$fields = collection($fields)
  ->filter(function($field) use ($schema) {
    return !in_array($schema->columnType($field), ['binary', 'text']);
  })
  ->take(7);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $pluralHumanName ?>

    <div class="pull-right"><CakePHPBakeOpenTag= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) CakePHPBakeCloseTag></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><CakePHPBakeOpenTag= __('List of') CakePHPBakeCloseTag> <?= $pluralHumanName ?></h3>
          <div class="box-tools">
            <form action="<CakePHPBakeOpenTagphp echo $this->Url->build(); CakePHPBakeCloseTag>" method="POST">
              <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control" placeholder="<CakePHPBakeOpenTag= __('Fill in to start search') CakePHPBakeCloseTag>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><CakePHPBakeOpenTag= __('Filter') CakePHPBakeCloseTag></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
<?php  foreach ($fields as $field): ?>
              <th><CakePHPBakeOpenTag= $this->Paginator->sort('<?= $field ?>') CakePHPBakeCloseTag></th>
<?php  endforeach; ?>
              <th><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></th>
            </tr>
            <CakePHPBakeOpenTagphp foreach ($<?= $pluralVar ?> as $<?= $singularVar ?>): CakePHPBakeCloseTag>
              <tr>
<?php  foreach ($fields as $field) {
    $isKey = false;
    if (!empty($associations['BelongsTo'])) {
    foreach ($associations['BelongsTo'] as $alias => $details) {
      if ($field === $details['foreignKey']) {
        $isKey = true;
?>
                <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
<?php
          break;
        }
      }
    }

    if ($isKey !== true) {
      if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
?>
                <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
      } else {
?>
                <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
      }
    }
  }
  $pk = '$' . $singularVar . '->' . $primaryKey[0];
?>
                <td class="actions" style="white-space:nowrap">
                  <CakePHPBakeOpenTag= $this->Html->link(__('Edit'), ['action' => 'edit', <?= $pk ?>], ['class'=>'btn btn-primary btn-xs']) CakePHPBakeCloseTag>
                  <CakePHPBakeOpenTag= $this->Form->postLink(__('Delete'), ['action' => 'delete', <?= $pk ?>], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) CakePHPBakeCloseTag>
                </td>
              </tr>
            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <CakePHPBakeOpenTagphp echo $this->Paginator->numbers(); CakePHPBakeCloseTag>
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->
