<section class="content-header">
  <h1>
    Corporate Address
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'CorporateAddresses', 'action' => 'add')); ?>">Add</a></li>
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
                <th>End Date</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>Address3</th>
                <th>City</th>
                <th>Country</th>
                <th>State</th>
				<th>Province</th>
				<th>Zip Code</th>
				<th>Country</th>
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










