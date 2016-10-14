<section class="content-header">
  <h1>
    Category
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
        <?= $this->Form->create($category, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('parent_id', ['options' => $parentCategories, 'empty' => true, 'placeholder' => $category->parent_id, 'disabled' => true]);
            echo $this->Form->input('lft', ['placeholder' => $category->lft, 'disabled' => true]);
            echo $this->Form->input('rght', ['placeholder' => $category->rght, 'disabled' => true]);
            echo $this->Form->input('name', ['placeholder' => $category->name, 'disabled' => true]);
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
