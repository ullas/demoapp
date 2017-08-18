<?php
function RecursiveCategories($array,$userrole) {

    if (count($array)) {
            echo "\n<ul id='org' style='display:none'>\n";
        foreach ($array as $vals) {

			if($userrole=="admin"){

            	$htmlstr='<div id=mptl><i class="fa fa-briefcase"></i> <small class="text-muted">'.$vals['name'].'</small>
            				<hr/><b>Take Action</b><ul class=list-unstyled>
                    		<li><a href="/Employees/view/'.$vals['EmpDataBiographies']['employee_id'].'" data-remote="false">View Profile</a></li>
                    		<li><a href="/Orgchartactions/transfer/'.$vals['EmpDataBiographies']['employee_id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Transfer</a></li>
                    		<li><a href="/Orgchartactions/promotion/'.$vals['EmpDataBiographies']['employee_id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Promotion</a></li>
                    		<li class="divider"></li>
                    		<li><a href="/Orgchartactions/addresschange/'.$vals['EmpDataBiographies']['employee_id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Address Change</a></li>
                    		<li><a href="#" class="open-Popup" data-toggle="modal" data-remote="false" data-target="#actionspopover">Global Assignment</a></li>
                    		<li><a href="/Orgchartactions/addnote/'.$vals['EmpDataBiographies']['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Add Note</a></li>
                    		<li><a href="/Orgchartactions/terminate/'.$vals['EmpDataBiographies']['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Termination</a></li>
                    		<li><a href="/Orgchartactions/retirement/'.$vals['EmpDataBiographies']['employee_id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Retirement</a></li>
	                    	</ul></div>';
							
			}else if($userrole=="employee"){
								
					$htmlstr='<div id=mptl><i class="fa fa-briefcase"></i> <small class="text-muted">'.$vals['name'].'</small>
            				<hr/></div>';			
			}else{
								
					$htmlstr='<div id=mptl><i class="fa fa-briefcase"></i> <small class="text-muted">'.$vals['name'].'</small>
            				<hr/></div>';			
			}
							
							
                    echo "<li id=\"".$vals['id']."\"><div class='node-title'><a href='#' tabindex='0' id='".$vals['id']."' class='popoverbtn' data-trigger='focus' data-html='true' data-toggle='popover'
                    		 title='".$vals['EmpDataPersonals']['first_name']." ".$vals['EmpDataPersonals']['middle_name']." ".$vals['EmpDataPersonals']['last_name']."'
 							data-content='".$htmlstr."'>".$vals['EmpDataPersonals']['first_name']." ".$vals['EmpDataPersonals']['middle_name']." ".$vals['EmpDataPersonals']['last_name']."</a></div>";
 					//check image filename exists for the employee
					if(isset($vals['Employees']['profilepicture']) && ($vals['Employees']['profilepicture']!='')){$picturename=$vals['Employees']['profilepicture'];}
                    else{$picturename='/img/uploadedpics/defaultuser.png';}
                    //checking image exists in folder											
					if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
						echo "<div class='node-pic'><img class='node-profile-img' src='/img/uploadedpics/".$picturename."'></div>";	
					}else{
						echo "<div class='node-pic'><img class='node-profile-img' src='/img/uploadedpics/defaultuser.png'></div>";
					}
 					
 					echo "<div class='node-position'>".$vals['name']."</div>";
 					
                    if (count($vals['children'])) {
                            RecursiveCategories($vals['children'],$userrole);
                    }
                    echo "</li>\n";
        }
            echo "</ul>\n";
    }
} ?>

<?= RecursiveCategories($orgpositions,$userrole); 
// foreach ($orgpositions as $vals) {echo '<a>'.$vals.'</a>';}?> 

<style>
.popover-content  a{font-size:12px;}
.popover{ min-width: 200px; }
/*.jOrgChart .left { width:50%; }
.jOrgChart .right{ width:50%; }*/
</style>

<section class="content-header">
	<h1> Organization Chart </h1>
	<ol class="breadcrumb">
		<li class="active"><i class="fa fa-sitemap"></i> Organization Chart</li>
	</ol>
</section>
<section class="content">
    <div class="box box-primary"><div class="box-body">
    <div id="chart" class="orgChart"></div></div></div>
</section>
    
<div id='loadingmessage' style='display:none;'>
	<i class="fa fa-refresh fa-spin loading-icon"></i>
</div>
<style>
	#loadingmessage{
		position: fixed;
    	bottom: calc(100% - 50%);
    	right:50%;
    	/*background: #363637;*/
    	padding: 5px 0px 4px;
    	z-index: 1900;
	}
	.loading-icon{
    	color: #21A57E;
    	padding: 3px 9px 0 10px;
    	font-size: 45px;
	}
	
</style>
<?php $this->start('scriptIndexBottom'); ?>
    <script>
        jQuery(document).ready(function() {

		var action='<?php echo $this->request->params['action'] ?>';
		if(action=="orgchart"){
			var atag = $('a[href="/Positions/orgchart"]');
			atag.parent().addClass('active');
			var a = $('a[href="/<?php echo $this->request->params['controller'] ?>"]');
        	if (!a.parent().hasClass('treeview')) {
            	a.parent().removeClass('active').parents('.treeview').removeClass('active');
        	}
		}
		
        
        
        	$("#org").jOrgChart({
            chartElement : '#chart',
            dragAndDrop  : false
 
        });

            /* Custom jQuery for the example
            $("#show-list").click(function(e){
                e.preventDefault();

                $('#list-html').toggle('fast', function(){
                    if($(this).is(':visible')){
                        $('#show-list').text('Hide underlying list.');
                        $(".topbar").fadeTo('fast',0.9);
                    }else{
                        $('#show-list').text('Show underlying list.');
$(".topbar").fadeTo('fast',1);
                    }
                });
            });*/

            $('#list-html').text($('#org').html());

            $("#org").bind("DOMSubtreeModified", function() {
                $('#list-html').text('');

                $('#list-html').text($('#org').html());

                // prettyPrint();
            });


            //Maptell

            // $('<div class="node-img"></div>').appendTo('td.node-cell');

            //popover
            $('[data-toggle="popover"]').popover({
            	container: 'body'
            });

	$("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){
				//loading icon hide
				if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				alert(msg);
			}else{
				
				var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
				if(userdf==1){
					$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}else{
					$('.mptldp').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}
	    		//select 2 
    			$(".select2").select2({ width: '100%',allowClear: true,placeholder: "Select" });
				//hide popover on button click
				$( ".popoverDelete" ).click(function() {
					$('#actionspopover').modal('hide');
				});
			}
		});
	});

			$('.node-title').click(function(event) {
				event.stopPropagation();
			});
			
	$('#actionspopover').on('hidden.bs.modal', function (e) {
	  $('.modal-body', this).empty();
	})
	
        });

// called when popover shown
$(document).on("click", ".open-Popup", function () {
     document.getElementById('UID').value = $(this).attr("id");
});

    </script>
<?php $this->end(); ?>
 <!-- hidden field -->
<input type="hidden" id="UID">

<!-- add actions popover -->
<?php echo $this->element('popoverelmnt'); ?>