<section class="content-header">
  <h1>
    Time Account Type
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'TimeAccountTypes', 'action' => 'add')); ?>">Add</a></li>
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
                <th>Unit</th>
                <th>Perm Reccur</th>
                <th>Start Date</th>
                <th>Valid From</th>
                <th>Valid From Day</th>
                <th>Account Booking Off</th>
                <th>Freq Period</th>
                <th>First Offset</th>
                <th>Start Accrual</th>
                <th>Accrual Base</th>
                <th>Min Balance</th>
                <th>Posting Order</th>
                <th>Time To Accrual</th>
                <th>Proration Used</th>
                <th>Rounding Used</th>
                <th>Update Rule</th>
                <th>Payout Eligiblity</th>
                <th>Code</th>
                <th>Pay Component</th>
                <th>Time To Actual Unit</th>
                <th>Pay Component Group</th>
                                    
                
                
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




















