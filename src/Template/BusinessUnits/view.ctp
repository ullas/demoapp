<section class="content-header">
  <h1>
    Businessunit
    <small><?= __('View') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
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
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($businessunit, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('name', ['placeholder' => $businessunit->name, 'disabled' => true]);
            echo $this->Form->input('description', ['placeholder' => $businessunit->description, 'disabled' => true]);
            echo $this->Form->input('effective_status', ['placeholder' => $businessunit->effective_status, 'disabled' => true]);
            echo $this->Form->input('effective_start_date', ['empty' => true, 'default' => '']);
            echo $this->Form->input('effective_end_date', ['empty' => true, 'default' => '']);
            echo $this->Form->input('external_code', ['placeholder' => $businessunit->external_code, 'disabled' => true]);
            echo $this->Form->input('head_of_unit', ['placeholder' => $businessunit->head_of_unit, 'disabled' => true]);
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>
