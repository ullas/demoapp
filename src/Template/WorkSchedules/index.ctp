<section class="content-header">
  <h1>
    Workflow Schedules
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
  	
  	<button id="togglebutton" type="button" class="btn btn-primary btn-circle" data-toggle="collapse" data-target="#infobar">
      <span class="fa fa-chevron-up fs20"></span>
	</button>

    <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section>
<?php echo $this->element('indexbasic', array('title' => 'Work Schedules')); ?>