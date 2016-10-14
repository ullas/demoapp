<section class="content-header">
  <h1>
    Address
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Addresses', 'action' => 'add')); ?>">Add</a></li>
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
            	<!-- <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th> -->
                <th>Id</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>
    </div></div>
   
 

</section>
<?php
$this->Html->css([ 'AdminLTE./plugins/datatables/dataTables.bootstrap',  ], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
  	
  	
  	// $.fn.dataTable.ext.errMode=throw;
  	
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
      	"ajax": "/<?php echo $this->request->params['controller'] ?>/ajaxData",
      	'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" name="chk' + data + '" value="' + $('<div/>').text(data).html() + '">';
         }
      }]
  
    });
    
    $('<a href="/<?php echo $this->request->params['controller'] ?>/add/" class="btn btn-sm btn-success" style="margin-left:5px;"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
    

  });
</script>
<?php $this->end(); ?>







