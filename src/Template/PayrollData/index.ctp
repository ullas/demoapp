<style>
@media (min-width: 768px) {
  .modal-dialog {
    width: 800px;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
  .modal-sm {
    width: 300px;
  }
}	
</style>

<section class="content-header">
  <h1>
    Payroll Data
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
  	
  	
  	<div class="box-tools pull-right"style="margin-left:15px;" >
                <div class="has-feedback">
                  <input type="text" id="payrolldatasearch"  onkeyup="searchpayrolldata()"  class="form-control input-sm" placeholder="Search...">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
  	<a href="/PayrollData/add" id="addpayrolldata" class="open-Popup btn btn-sm btn-success" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>

    <!-- <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?> -->
  </ol>
</section>


<section class="content panel-group" id="contentsection">
	
	
	<?php foreach ($content as $vals) { ?>
          <div class="panel box box-default mptlpanel" id="<?php echo $vals['empid']; ?>">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $vals['empname']; ?></h3>
              <small><?php echo "PayComponents: ".count($vals['pcchild']);echo ", Pay Component Groups: ".count($vals['pcgroupchild']);?></small>

              <div class="box-tools pull-right">
              	<a href="/PayrollData/addempdata/<?php echo $vals['empid']; ?>" class="open-Popup btn btn-xs btn-success" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add">Add</a>

              	<a data-toggle="collapse" data-parent="#contentsection" href="#mainpanel<?php echo $vals['empid'];  ?>" aria-expanded="false" class="collapsed">
              		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="more-less fa fa-square-o text-navy"></i>
                	</button>
                </a>
              	
                
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div id="mainpanel<?php echo $vals['empid'];  ?>" class="emppanel panel-collapse collapse" aria-expanded="false"><!-- <div class="box-body"> -->
            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;"> PAY COMPONENTS </h4>
            	
            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Pay Component</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pay Component Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($vals['pcchild'] as $childval) { ?>
              
              

            <tr>
                <td><?php echo  $childval['paycomponent']; ?></td>
                <td><?php echo  $childval['startdate']; ?></td>
                <td><?php echo  $childval['enddate']; ?></td>
                <td><?php echo  $childval['paycomponentvalue']; ?></td>
                <td> <a href="/PayrollData/edit/<?php echo $childval['id']; ?>" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover"><i class="editlink fa fa-pencil p3 text-aqua" aria-hidden="true"></i></a>

                	
                	<?php echo  '<form name="formdelete" id="formdelete' .$childval['id']. '" method="post" action="/PayrollData/delete/'.$childval['id'].'" style="display:none;" >
                    <input type="hidden" name="_method" value="POST"></form>
                    <a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete the pay component '.$childval['paycomponent'].' from '.$vals['empname'].'?&quot; , 
                    function(){ var lastemppanel=$(&quot;.emppanel.panel-collapse.collapse.in&quot;).attr(&quot;id&quot;);localStorage.setItem(&quot;lastemppanel&quot;, lastemppanel);
					 document.getElementById(&quot;formdelete'.$childval['id'].'&quot;).submit(); })
                    event.returnValue = false; return false;" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';   ?>
                	
                </td>
            </tr>
          

			<?php } ?>  
			</tbody>
    	</table>

			<h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;"> PAY COMPONENT GROUPS </h4>
            <div id="accordion<?php echo $vals['empid']; ?>">
            <?php  foreach ($vals['pcgroupchild'] as $childval) { ?>
              <!-- <h4><?php echo $childval['groupname'];  ?></h4>	 -->
            
            
         <div class="box box-default" style="margin-bottom:0px;">
           <div class="box-header">
             <!-- <h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion<?php echo $vals['empid']; ?>" href="#panel<?php echo $childval['groupid'];  ?>" aria-expanded="false" class="collapsed"> -->
             	<?php echo $childval['groupname'];  ?>
             	<!-- </a></h4> -->
           
           	<?php echo  '<form name="formdelete" id="formdelete' .$childval['groupid'].$vals['empid'].'" method="post" action="/PayrollData/deletegroup/'.$childval['groupid'].'^'.$vals['empid'].'" style="display:none;" >
                    	<input type="hidden" name="_method" value="POST"></form>
                    	<a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete the pay component group '.$childval['groupname'].' from '.$vals['empname'].'?&quot; , 
                    	function(){ var lastemppanel=$(&quot;.emppanel.panel-collapse.collapse.in&quot;).attr(&quot;id&quot;);localStorage.setItem(&quot;lastemppanel&quot;, lastemppanel);
                    	document.getElementById(&quot;formdelete'.$childval['groupid'].$vals['empid'].'&quot;).submit(); })
                    	event.returnValue = false; return false;" class="deletelink fa fa-trash text-red pull-right" style= "padding:3px"></a>';   ?>
           
           
           </div>
           <div id="panel<?php echo $childval['groupid'];  ?>" >
                  	
	<table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<!-- <th>Pay Component Group</th> -->
                <th>Pay Component</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pay Component Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
              <?php  foreach ($childval['grouplist'] as $groupval) { ?>

            <tr>
                <!-- <td><?php echo  $groupval['paycomponentgroup']; ?></td> -->
                <td><?php echo  $groupval['paycomponent']; ?></td>
                <td><?php echo  $groupval['startdate']; ?></td>
                <td><?php echo  $groupval['enddate']; ?></td>
                <td><?php echo  $groupval['paycomponentvalue']; ?></td>
                <td><a href="/PayrollData/edit/<?php echo $groupval['compid']; ?>" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover"><i class="editlink fa fa-pencil p3 text-aqua" aria-hidden="true"></i></a>

						<!-- <?php echo  '<form name="formdelete" id="formdelete' .$groupval['id']. '" method="post" action="/PayrollData/delete/'.$groupval['id'].'" style="display:none;" >
                    	<input type="hidden" name="_method" value="POST"></form>
                    	<a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete the pay component '.$groupval['paycomponent'].'?&quot; , 
                    	function(){ document.getElementById(&quot;formdelete'.$groupval['id'].'&quot;).submit(); })
                    	event.returnValue = false; return false;" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';   ?> -->
                </td>
            </tr>
          <?php } ?>  

			
			</tbody>
    	</table>
    	
   		</div></div>
		<?php } ?>  </div>
		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
    <?php } ?>    
        
</section>
<!-- add actions popover -->
<?php echo $this->element('popoverelmnt'); ?>






<?php $this->start('scriptIndexBottom'); ?>
<script>
var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
var paycomponentdata=[];
var paycomponentarr=<?php echo $paycomponentarr ?>;
$.each(paycomponentarr, function(key, value) {
    paycomponentdata.push({'id':value['id'], "text":value['name'], "canoverride":value['can_override']});
});
// console.log(paycomponentdata);
var paycomponentgroupdata=[];
var paycomponentgrouparr=<?php echo $paycomponentgrouparr ?>;
$.each(paycomponentgrouparr, function(key, value) {
    paycomponentgroupdata.push({'id':key, "text":value});
});

var emppcgrouparr=<?php echo $empgrouplist ?>;
// console.log(emppcgrouparr);
	
$(function () {
	
	//check if last expanded emp panel exists,if so expand it
	var lastemployeepanel = localStorage.getItem('lastemppanel');//console.log(lastemployeepanel);
	$("#"+lastemployeepanel).addClass("in");$("#"+lastemployeepanel).attr("aria-expanded","true");
	
	
	$("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				sweet_alert(msg);
			}else{

				
				//disable paycomponent value textbox, if can_override==1(no)
				for(var i = 0; i < paycomponentdata.length; i++) {
					if(paycomponentdata[i]['id']==$('#paycomponent').val()){
						(paycomponentdata[i]['canoverride']=="1") ? $('#pay-component-value').prop("disabled","true")  : $('#pay-component-value').removeAttr("disabled");
					}
    			}
    				
    				
				$('.mptlupdate').click(function(e){
					
					var lastemppanel=$('.emppanel.panel-collapse.collapse.in').attr('id');localStorage.setItem('lastemppanel', lastemppanel);
					
    				//get input value
    				var id = $("#id").val();
					
					var emp = $("#empdatabiographies-id").val();
					var paycomp=$("#paycomponent").val();
    				var startdate = $("#start-date").val();
					var enddate = $("#end-date").val();
				
					if (emp=="" || emp==null){
						sweet_alert("Please select a Employee.");
						return false;
					}else if (paycomp=="" || paycomp==null){
						sweet_alert("Please select a paycomponent.");
						return false;
					}else if (startdate=="" || startdate==null || enddate=="" || enddate==null){
						sweet_alert("Please select Start/End Date.");
						return false;
					}else{
						$.ajax({
        				type: "POST",
      					url: '/PayrollData/checkPayComponentExistence',
        				data: 'employee='+emp+'&id='+id+'&paycomponent='+paycomp+'&startdate='+startdate+'&enddate='+enddate,
        				success : function(data) {
        					if(data=="success"){
        						document.getElementById("editprdataform").submit();
    							return true; 
    						}else{
    							sweet_alert(data);
								return false;  
    						}
    						
        				},error: function(data) {
       						sweet_alert("Error while editing PayComponents.");
							return false;   			

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while editing PayComponent's.");
								return false;
        					}
      					}
      
        			});
        			return false;  
					}
					// return false;  
				});
		
				//save btn onclick
	$('#mptlsave').click(function(){
		
		var lastemppanel=$('.emppanel.panel-collapse.collapse.in').attr('id');localStorage.setItem('lastemppanel', lastemppanel);
					
    	//get input value
		var emp = $("#empdatabiographies-id").val();
		
		var pccount = $('.componentclass').length;
		var pcgcount = $('.groupclass').length;
		
		if (emp=="" || emp==null){
			sweet_alert("Please select a Employee.");
			return false;
		}
		
		if(pccount<1 && pcgcount<1){
		
			sweet_alert("Please add a pay Component/Pay Component Group for the particular Employee.");
			return false;  
		}else{
			if(pccount>0){
				
				var paycomp=$("#paycomponent1").val();
    			var paycompval=$("#paycomponentvalue1").val();
    			var startdate = $("#startdate1").val();
				var enddate = $("#enddate1").val();
		
				if(paycomp!="" && paycomp!=null && startdate!="" && startdate!=null && enddate!="" && enddate!=null){
					
					$.ajax({
        				type: "POST",
      					url: '/PayrollData/addData',
        				data: 'employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponentgroup=0&paycomponent='+paycomp+'&paycomponentvalue='+paycompval+'&type=1',
        				success : function(data) {
        					if(data=="success"){
    							window.location='/payroll-data';
    						}else{
    							sweet_alert(data);
								return false;  
    						}
    						
        				},error: function(data) {
       						sweet_alert("Error while adding PayComponents.");
							return false;   			

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding PayComponent's.");
								return false;
        					}
      					}
      
        			});
					
				}else{
					sweet_alert("Pay Component/Start/End Date missing.");
					return false;
				}
			}else if(pcgcount>0){
				
    			var paycompgroup=$("#pcgroup1").val();
    			if(paycompgroup!="" && paycompgroup!=null){
		
				var pcgcolcount=$('.pcgcol').length;
    			for (i = 1; i <= pcgcolcount; i++) {
    				
    				var paycomp=$("#paycomp"+i).attr('name');console.log(paycomp);
    				var paycompval=$("#paycomponentvalue"+i).val();
    				var startdate = $("#startdate"+i).val();
					var enddate = $("#enddate"+i).val();
				
				if(startdate!="" && startdate!=null && enddate!="" && enddate!=null){
					
					$.ajax({
        				type: "POST",
      					url: '/PayrollData/addData',
        				indexValue: i,
        				data: 'employee='+emp+'&startdate='+startdate+'&enddate='+enddate+'&paycomponentgroup='+paycompgroup+'&paycomponent='+paycomp+'&paycomponentvalue='+paycompval+'&type=2',
        				success : function(data) {
        					if(data=="success"){
        						if(this.indexValue==pcgcolcount || this.indexValue>pcgcolcount){
    								window.location='/payroll-data';
    							}
    						}else{
    							sweet_alert("Error while adding PayComponent Group.");
								return false;  
    						}
    						
        				},error: function(data) {
       						sweet_alert("Error while adding PayComponent Group.");
							return false;   			

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding PayComponent Group.");
								return false;
        					}
      					}
      
        			});
					
				}else{
					sweet_alert("Start/End Date missing.");
					return false;
				}
				}
			}else{
				sweet_alert("Pay Component Group missing.");
				return false;
			}
		}
		}
  });
  
  				//enable/disable paycomponent value on pay component change against can_override
  				$('#paycomponent').change(function(){

  					$('#pay-component-value').attr("value",' ');
  					for(var i = 0; i < paycomponentdata.length; i++) {
        				if(paycomponentdata[i]['id'] == $(this).val()) {
            				(paycomponentdata[i]['canoverride']=="1") ? $('#pay-component-value').prop("disabled","true")  : $('#pay-component-value').removeAttr("disabled");
        				}
    				}
  				});
  				//enable/disable paycomponent value on pay component change against can_override on pc group
				$('.maindiv').on('change', 'input.pcomp', function() {
			
					for(var i = 0; i < paycomponentdata.length; i++) {
        				if(paycomponentdata[i]['id'] == $(this).val()) {
            				(paycomponentdata[i]['canoverride']=="1") ? $('#paycomponentvalue1').prop("disabled","true")  : $('#paycomponentvalue1').removeAttr("disabled");
        				}
    				}
				});		
				//load pay components as well as value,start and end date for the particular pay component group
				$('.maindiv').on('change', 'input.pcgroup', function() {
				
					$(this).parent().closest('div .groupclass').find('.pcgcol').remove();
					$(this).parent().closest('div .groupclass').find('.spacecol').remove();
		
					var selectedCtrl = $(this);
		
					var selectedVal = this.value;
					$.get('/PayrollData/getPayComponentGroupData?pcgid='+selectedVal, function(result) {
						var obj = JSON.parse(result);
						for(t = 0; t < obj.length; t++){
    						var numItems = $('.pcgcol').length+1;
    						//disable pay component value textbox if can override set to no
    						var visibletype="";
    						(obj[t]['can_override']=="1")?visibletype=" disabled " : visibletype="";//console.log(obj[t]['can_override']);
    						if(t>0){
    							// selectedCtrl.closest(".groupclass").append("<div class='col-sm-4 spacecol'></div>");
    						}else{
    							selectedCtrl.closest(".groupclass").append("<div class='col-sm-12 spacecol'></div>");
    						}
    						selectedCtrl.closest(".groupclass").append("<div class='pcgcol'><div class='col-sm-3 groupcol'><div class='form-group'><label>Pay Component:</label><input id='paycomp"+numItems+"' disabled type='text' value='"+obj[t]['name']+"' class='form-control paycompnt' name='"+obj[t]['id']+"'></div></div><div class='col-sm-3'><label>Value:</label><input class='form-control'"+visibletype+"  id='paycomponentvalue"+numItems+"'/></div><div class='col-sm-3 groupcol'><div class='form-group'><label>Start Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='startdate"+numItems+"' type='text' class='form-control mptldp'></div></div></div><div class='col-sm-3 groupcol'><div class='form-group'><label>End Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='enddate"+numItems+"' type='text' class='form-control mptldp'></div></div></div></div>");
    				
							//date picker
							if(userdf==1){
								$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
							}else{
								$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
							}
    					}
    				});    		
				});
	
				//add pay component group button click
				$("#btnAddPCG").click(function (event) {
					var emp = $("#empdatabiographies-id").val();
					if(emp!="" && emp!=null){
						event.preventDefault();
			
						$(".pcaddbtn").hide();$(".pcgroupaddbtn").hide();
		
						var numItems = $('.groupclass').length+1;
						$(".maindiv").append("<div class='clearfix'><div class='groupclass' id='groupDiv"+numItems+"'><div class='col-sm-4'><div class='form-group'><label>Pay Component Group:</label><div class='input-group'><div class='input-group-btn'><a class='groupdelete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div><input type='text' class='pcgroup form-control' id='pcgroup"+numItems+"'/></div></div></div></div></div>");
						
						// var groupdata=[];//console.log(emppcgrouparr);
						// for(var p=0;p<paycomponentgroupdata.length;p++) {
							// // console.log(paycomponentgroupdata[p]);
							// $.each(emppcgrouparr, function(childkey, childvalue) {
								// if(emp==value['empdatabiographies_id']){
//     							
    							// }else{
    								// groupdata.push({'id':key, "text":value});
    							// }
							// });
							// // console.log(emppcgrouparr[0]['empdatabiographies_id']+"--"+emp+"--"+key);
//     						
						// }
						
						$('.pcgroup').select2({ width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata });			
						
					}else{
						sweet_alert("Please select a Employee.");
   						return false;
					}
				});
				//add pay component button click
				$("#btnAddControl").click(function (event) {
		
					var emp = $("#empdatabiographies-id").val();
					if(emp!="" && emp!=null){
						$(".pcaddbtn").hide();$(".pcgroupaddbtn").hide();
		
						event.preventDefault();
						var numItems = $('.componentclass').length+1;
						$(".maindiv").append("<div class='componentclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Pay Component:</label><div class='input-group'><div class='input-group-btn'><a class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='text' class='pcomp form-control' id='paycomponent"+numItems+"'/></div></div><div class='col-sm-4'><label>Pay Component Value:</label><input class='pcval form-control'  id='paycomponentvalue"+numItems+"'/></div><div class='col-sm-4 groupcol'><div class='form-group'><label>Start Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='startdate"+numItems+"' type='text' class='form-control mptldp'></div></div></div><div class='col-sm-4 groupcol'><div class='form-group'><label>End Date:</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input id='enddate"+numItems+"' type='text' class='form-control mptldp'></div></div></div></div></div>");
						$('.pcomp').select2({ width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata });
				
						//date picker
						if(userdf==1){ $('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true }); }
						else{ $('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true }); }
			
					}else{
						sweet_alert("Please select a Employee.");
   						return false;
					}
		
				});
				
				//group delete btn onclick
				$('.maindiv').on('click', 'a.groupdelete', function() {
					
					$(".pcaddbtn").show();$(".pcgroupaddbtn").show();
		
					var selectedcontrol=$(this);
					sweet_confirmdelete("MayHaw","Are you sure you want to delete the particular Pay Component Group ?", function(){selectedcontrol.parent().closest('div .groupclass').remove(); return true;});   
				});
				//pay component delete btn onclick
				$('.maindiv').on('click', 'a.compdelete', function() {
					$(".pcaddbtn").show();$(".pcgroupaddbtn").show();
		
					var selectedcontrol=$(this);
					sweet_confirmdelete("MayHaw","Are you sure you want to delete the particular Pay Component ?", function(){selectedcontrol.parent().closest('div .componentclass').remove(); return true;});     
				});
				//initialise datepicker
				if(userdf==1){
					$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}else{
					$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
				}
	    		//set mandatory * after required label	
    			$( ':input[required]' ).each( function () {
        			$("label[for='" + this.id + "']").addClass('mandatory');
    			});
    
	    		//select 2
    			$(".select2").select2({ width: '100%',allowClear: true,placeholder: "Select" });
				//hide popover on button click
				$( ".popoverDelete" ).click(function() {
					$('#actionspopover').modal('hide');
				});
			}
		});
	});


	$('#actionspopover').on('hidden.bs.modal', function (e) {
	  $('.modal-body', this).empty();
	});
	
	// $("[data-widget='collapse']").click(function() {
		// $(".box").addClass("collapsed-box");
		// $('.box-body').not(this).hide();
		// $(this).closest(".box-body").show();
		// $(this.target)
        // .prev('.panel-heading')
        // .find(".more-less")
        // .toggleClass('glyphicon-plus glyphicon-minus');console.log("entered");
	// });
    
    
    
// $('.panel-group').on('hidden.bs.collapse', toggleIcon);
// $('.panel-group').on('shown.bs.collapse', toggleIcon);

});
// function toggleIcon(e) {//console.log("entered");
    // $(e.target)
        // .prev('.box-header')
        // .find(".more-less")
        // .toggleClass(' fa-plus fa-minus ');
// }
function searchpayrolldata(){
	// $(".mptlpanel").hide();
	var input = document.getElementById('payrolldatasearch');
    var filter = input.value.toUpperCase();
    
    
	$('.mptlpanel').each(function(){
		// console.log($(this).attr("id"));
		var selectedcontrol=$(this);
		var a = $(this).find(".box-title").text();
        if (a.toUpperCase().indexOf(filter) > -1) {
            selectedcontrol.show();
        } else {
            selectedcontrol.hide();
        }
	});
	
}


</script>
<?php $this->end(); ?>
