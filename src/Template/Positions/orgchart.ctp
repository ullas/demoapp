<?php
function RecursiveCategories($array) {

    if (count($array)) {
            echo "\n<ul id='org' style='display:none'>\n";
        foreach ($array as $vals) {

            $htmlstr='<div id=mptl><h5 class="text-muted text-center">Position</h5>
            				<i class="fa fa-briefcase text-muted"></i><small> Company</small><br/>
             				<i class="fa fa-envelope text-muted"></i><small> maill@server.com</small>
            				<hr/><b>Take Action</b><ul class=list-unstyled>
                    		<li><a href="/Actions/transfer/'.$vals['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Transfer</a></li>
                    		<li><a href="/Actions/promotion/'.$vals['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Promotion</a></li>
                    	<li class="divider"></li>
                    	<li><a href="/Actions/addresschange/'.$vals['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Address Change</a></li>
                    	<li><a href="#" class="open-Popup" data-toggle="modal" data-remote="false" data-target="#actionspopover">Global Assignment</a></li>
                    	<li><a href="/Actions/addnote/'.$vals['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Add Note</a></li>
                    	<li><a href="/Actions/terminate/'.$vals['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Termination</a></li>
                    	<li><a href="/Actions/retirement/'.$vals['id'].'" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Retirement</a></li>
	                    </ul></div>';
                    echo "<li id=\"".$vals['id']."\"><div class='node-title'><a href='#' tabindex='0' id='".$vals['id']."' class='popoverbtn' data-trigger='focus' data-html='true' data-toggle='popover' title='".$vals['name']."'
 							data-content='".$htmlstr."'>".$vals['name']."</a></div><div class='node-pic'><img class='node-profile-img' src='https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg'></div>
 							<div class='node-position'>Position</div>";
                    if (count($vals['children'])) {
                            RecursiveCategories($vals['children']);
                    }
                    echo "</li>\n";
        }
            echo "</ul>\n";
    }
} ?>

<?= RecursiveCategories($orgpositions) ?> 

<style>
.popover-content  a{font-size:12px;}
/*.popover{ min-width: 500px; }*/
</style>
<!-- <ul id="org" style="display:none">
    <li>
       Food
       <ul>
         <li id="beer">
         	 <div class='node-title'><dt>Title</dt></div>
             <div class='node-pic'><img class="node-profile-img" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="message user image"></div>
             <div class='node-position'>Position</div>
		 </li>
         <li>Bread</li>
       </ul>
     </li>
   </ul> -->
    <section class="content-header">
      <h1>
       Organization Chart
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-sitemap"></i> Organization Chart</li>
      </ol>
    </section>
<section class="content">
    <div class="box box-primary"><div class="box-body">
    <div id="chart" class="orgChart"></div></div></div></section>
    <script>
        jQuery(document).ready(function() {

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
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				alert(msg);
			}else{
				//loading icon hide
				if(e.relatedTarget!=null){$('#loadingmessage').hide();}
				//datepicker
	    		$('.mptldp').datepicker({
	    			format:"dd/mm/yy",
	      			autoclose: true,clearBtn: true
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
	})
	

        });

// called when popover shown
$(document).on("click", ".open-Popup", function () {
     document.getElementById('UID').value = $(this).attr("id");
});

    </script>
 <!-- hidden field -->
<input type="hidden" id="UID">

<!-- add actions popover -->
<?php echo $this->element('popoverelmnt'); ?>