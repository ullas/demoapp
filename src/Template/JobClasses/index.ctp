<section class="content-header">
  <h1>
    Job Class
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Job Class', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>
            	
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-xs-12">
  <div class="box box-primary">
  	<div class="box-body">
    <table id="mptlindextbl" class="table table-hover  table-bordered ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Effective Status</th>
                <th>Effective Start date</th>
                <th>Effective End Date</th>
                <th>Work Comp Code</th>
                <th>Default Job Level</th>
                <th>Standard Weekly Hours</th>
                <th>Regular Temporary</th>
                <th>Default Employee Class</th>
                <th>Full Time Employee</th>
                <th>Default Supervisor Level</th>
                <th>External Code</th>
                <th>Pay Grade Id</th>
                <th>Job Function Id</th>
                
                <th class="actions" data-orderable="false"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table></div></div>
    </div></div>
   
</section>
<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $('#mptlindextbl').DataTable({
      	"paging": true,
      	"lengthChange": true,
      	"searching": true,
      	"ordering": true,
      	"info": true,
      	"autoWidth": false,
     
      	//server side processing
      	"processing": true,
     	 "serverSide": true,
      	"ajax": "/<?php echo $this->request->params['controller'] ?>/ajaxData"
     
    });
  });
</script>
<?php $this->end(); ?>



















