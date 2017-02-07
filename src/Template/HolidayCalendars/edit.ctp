<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Holiday Calendar
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($holidayCalendar) ?>
    <fieldset>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('name');
            echo $this->Form->input('country');
            echo $this->Form->input('valid_from', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('valid_to', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			
			
			echo $this->Form->input('weekoff._ids', ['label'=>'Weekly Off','options' => array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),'class'=>'select2']);
			
        ?>
        
        <div class="col-md-4 pull-right"><div class="form-group"><input type="button" value="Get Weekly Off Dates" class="btn btn-xs btn-default" id="getweeklyoffdates"/></div></div>
        
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update'),['title'=>'Update','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>



<!-- <div class="box box-primary"><div class="box-body">
	<table id="weeklyofftable" border="1">
        <thead><tr>
            <th>Date</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div></div> -->

              
 <div class="box box-primary">
      <div class="box-body">
    <table id="mptlindextbl" class="table table-hover  table-bordered ">
        <thead>
            <tr>
           	
                <th data-orderable="false"><input type="checkbox" name="select_all" value="1" id="select-all" ></th>
           		<?php
                  for($i=1;$i<count($configs);$i++){
                  		
                  	echo "<th>". $configs[$i]['title'] ."</th>";
                  }
                ?>
                <th data-orderable="false">Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>

</section>



<?php
$this->Html->css([ 'AdminLTE./plugins/datatables/dataTables.bootstrap', 
  'AdminLTE./plugins/iCheck/all',
   'AdminLTE./plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min',
 ], ['block' => 'css']);
$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/extensions/TableTools/js/dataTables.tableTools',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
  'AdminLTE./plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min',
  'AdminLTE./plugins/daterangepicker/moment.min',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/iCheck.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  var table; var order; 
   function deleteRecord(btn){
  	
  	    if (btn == 'yes') {
            
            jQuery("form")[0].submit();
        }
  }
  $(function () {
    
      
     table= $('#mptlindextbl').DataTable({
          "paging": true,
          //disable 0th column checkbox default sort order
          "order": [[ 1, 'asc' ]],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true,
          colReorder: true,
          rowReorder: { update:false },
          stateSave:false,
          responsive: true,
          // "initComplete": function(settings, json) {
          // },
          "drawCallback": function( settings ) {
        		tableLoaded();
   		  },
          oLanguage        : {
        		sSearch: '<div class="input-group"><span class="input-group-addon"><span class="fa fa-search"></span></span>',
            	sSearchPlaceholder: 'Search here...',
		},
        //server side processing
          "processing": true,
          "serverSide": true,
          "ajax": "/Holidays/ajaxData",
          'columnDefs': [{
        'targets': 0,
        'className': 'dt-body-center',
        'render': function (data, type, full, meta){
            return '<input type="checkbox" class="mptl-lst-chkbox" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
        },
           
     },
     
     ]
    
    
     
     
	 
	
});

//col reorder
 order= new $.fn.dataTable.ColReorder( table );
 
 //get weekly off dates
 $('#getweeklyoffdates').click(function(){
 	
 	var validfrom = document.getElementById('valid-from').value;
 	var validtill = document.getElementById('valid-to').value;
 	var d1 = new Date(validfrom);
	var d2 = new Date(validtill);
	
	var weekoffdate = $("#weekoff-ids").val();
	var offdates = weekoffdate.toString().split(',');
 	var result=calcWeekOffDays(d1,d2,offdates);
 	
 	
 	
	for(t = 0; t < result.length; t++){
		var resArr = result[t].toString().split('^');
        $("#mptlindextbl").find("tbody").append( "<tr><td></td><td></td><td>"+resArr[1]+"</td><td>"+resArr[0]+"</td></tr>" );
  	}
 });
 
});


function calcWeekOffDays(dDate1, dDate2, dArr) {
    if (dDate1 > dDate2) return false;
    var date  = dDate1;
    var dates = [];

	var weekday = new Array(7);
	weekday[0] =  "Sunday";
	weekday[1] = "Monday";
	weekday[2] = "Tuesday";
	weekday[3] = "Wednesday";
	weekday[4] = "Thursday";
	weekday[5] = "Friday";
	weekday[6] = "Saturday";
	
    while (date < dDate2) {
    	for (i = 0; i < dArr.length; i++) {
    		if (date.getDay().toString() === dArr[i].toString()){
         		dates.push(new Date(date).toLocaleDateString('en-GB')+"^"+weekday[date.getDay()]);
        	}
    	}
        
        date.setDate( date.getDate() + 1 );
    }
    
    return dates;
}
 
function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){
       $("#ajax_button").html("<a href='/<?php echo $this->request->params['controller'] ?>/delete/"+ $(this).attr("data-id")+"' class='btn btn-outline'>Confirm</a>");
      $("#trigger").click();
    });
 
    $("#mptlindextbl tbody").find('tr').each(function () {
    	$(this).find('td').each (function() {
        var innerHtml=$(this).find('div.mptldtbool').html();
        // true/false instead of 1/0
        (innerHtml=="1") ? $(this).find('div.mptldtbool').html("True") : $(this).find('div.mptldtbool').html("False");      
        });    
    });
}


  
  
  
</script>
<?php $this->end(); ?>

