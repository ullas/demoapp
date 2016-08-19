<?php
use Cake\Utility\Inflector;
?>
<section class="content-header">
  <h1>
    <?= $singularHumanName ?>

    <small><CakePHPBakeOpenTag= __('<?= Inflector::humanize($action) ?>') CakePHPBakeCloseTag></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <CakePHPBakeOpenTag= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) CakePHPBakeCloseTag>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><CakePHPBakeOpenTag= __('Form') CakePHPBakeCloseTag></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>, array('role' => 'form')) CakePHPBakeCloseTag>
          <div class="box-body">
          <CakePHPBakeOpenTagphp
<?php
    foreach ($fields as $field) {
      if (in_array($field, $primaryKey)) {
        continue;
      }
      if (isset($keyFields[$field])) {
        $fieldData = $schema->column($field);
        if (!empty($fieldData['null'])) {
?>
            echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true]);
<?php
        } else {
?>
            echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>]);
<?php
        }
        continue;
      }
      if (!in_array($field, ['created', 'modified', 'updated'])) {
        $fieldData = $schema->column($field);
        if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
?>
            echo $this->Form->input('<?= $field ?>', ['empty' => true, 'default' => '']);
<?php
        } else {
?>
            echo $this->Form->input('<?= $field ?>');
<?php
        }
      }
    }
    if (!empty($associations['BelongsToMany'])) {
      foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
?>
            echo $this->Form->input('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>]);
<?php
      }
    }
?>
          CakePHPBakeCloseTag>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <CakePHPBakeOpenTag= $this->Form->button(__('Save')) CakePHPBakeCloseTag>
          </div>
        <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
      </div>
    </div>
  </div>
</section>
