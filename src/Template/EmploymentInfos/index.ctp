<section class="content-header">
  <h1>
    Employment Info
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'EmploymentInfos', 'action' => 'add')); ?>">Add</a></li>
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
                <th>Start Date</th>
                <th>First Date Worked</th>
                <th>Original Start Date</th>
                <th>Company</th>
                <th>Is Primary</th>
                <th>Seniority Date</th>
                <th>Benefits Eligibility Start Date</th>
                <th>Prev Employeeid</th>
				<th>Eligible For Stock</th>
				<th>Service Date</th>
				<th>Initial Stock Grant</th>
				<th>Initial Option Grant</th>
				<th>Job Credit</th>
				<th>Notes</th>
				<th>Is Contingent Worker</th>
				<th>End Date</th>
				<th>Ok To Rehinre</th>
				<th>Pay Roll End Date</th>
				<th>Last Date Worked</th>
				<th>Regret Termination</th>
				<th>Eligible for Sal Continuation</th>
				<th>Bonus Pay Expiration Date</th>
				<th>Stock End Date</th>
				<th>Salary End Date</th>
				<th>Benefits End Date</th>
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








