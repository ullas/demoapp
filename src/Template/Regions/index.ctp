<!-- <section class="content-header">
  <h1>
    Region
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Regions', 'action' => 'add')); ?>">Add</a></li>
  </ol>
</section>
            	
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
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                                    
                
                
                <th class="actions" data-orderable="false"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table></div></div>
    </div></div>

</section>
<style>
	.DTTT{
		margin-left:10px;
	}
	.DTTT .btn{
		background-color: #00a65a;
    	border-color: #008d4c;color:#FFF;padding:4px 10px;
	}
</style>
<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/extensions/TableTools/js/dataTables.tableTools',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],     
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
  	
    var table =$('#mptlindextbl').DataTable({
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
      	
        oLanguage        : {
        	// sSearch: '<div class="input-group"><span class="input-group-addon"><span class="fa fa-search"></span></span>',
            sSearchPlaceholder: 'Search here...',
    // search: '<i class="fa fa-search"></i>'
},
      	
      	
        // dom: 'T<"clear">lfrtip',
		// tableTools: {
			// "aButtons": [ "copy", "csv", "xls", "pdf", "print" ]
		// }
        
    });
    
    //table tools like export
    // var tt = new $.fn.dataTable.TableTools( table, {aButtons: [ "copy", "csv", "xls", "pdf", "print" ]} );
	// $( tt.fnContainer() ).appendTo('div.dataTables_filter');
	
	
	
  });
</script>
<?php $this->end(); ?> -->


<?php echo $this->element('indexbasic'); ?>