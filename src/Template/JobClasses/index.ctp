<section class="content-header">
  <h1>
    Job Classes
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
  
    <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section>
<?php echo $this->element('indexbasic', array('title' => 'Job Classes')); ?>