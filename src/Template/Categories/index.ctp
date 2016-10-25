<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Categories
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Categories</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('parent_id') ?></th>
              <th><?= $this->Paginator->sort('lft') ?></th>
              <th><?= $this->Paginator->sort('rght') ?></th>
              <th><?= $this->Paginator->sort('name') ?></th>
              <th><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categories as $category): ?>
              <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->name, ['controller' => 'Categories', 'action' => 'view', $category->parent_category->id]) : '' ?></td>
                <td><?= $this->Number->format($category->lft) ?></td>
                <td><?= $this->Number->format($category->rght) ?></td>
                <td><?= h($category->name) ?></td>
                <td class="actions" >
                	
                  <?= $this->Html->link(__('View'), ['action' => 'view', $category->id], ['class'=>'btn btn-info ']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id], ['class'=>'btn btn-primary ']) ?>
				  <?= $this->Html->link(__('Delete'), '#', ['class'=>'btn btn-danger delete-btn p3',"data-id"=>$category->id]) ?>
                	
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo $this->Paginator->numbers(); ?>
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->

  
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
     <div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Category deletion</h4>
              </div>
              <div class="modal-body">
                  Do you  really want  to delete this element?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <div id="ajax_button" class="pull-right"></div>
              </div>
          </div>
      </div>
  </div>
  


<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-danger">
        <div class="modal-content">
        	<div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Category deletion</h4>
              </div>
            <div class="modal-body">Are you sure,you want  to delete this element?</div>
            <div class="modal-footer">  
                <?= $this->Form->postLink(
                    $this->Html->tag('button','Delete',['class' => 'btn btn-outline pull-right']),
                    ['action' => 'delete', 3],
                    ['escape' => false])
                ?>
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>