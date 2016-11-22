<?php
function RecursiveCategories($array) {

    if (count($array)) {
            echo "\n<ul id='org' style='display:none'>\n";
        foreach ($array as $vals) {

            $htmlstr="<div id=mptl><h5 class=\"text-muted text-center\">Position</h5>
            				<h5 class=\"text-muted text-center\">Company</h5>
             				<i class=\"fa fa-envelope text-muted\"></i><small> maill@server.com</small>
            				<hr/><b>Take Action</b><ul class=list-unstyled>
                            <li><a href=\"../EmploymentInfos\">Employment Details</a></li>
                            <li><a href=\"#\" onclick=\"onclickTerminate(".$vals['id'].");\">Terminate</a></li>
                            <li><a href=\"../JobInfos\">Change Job and Compensation Info</a></li>
                            <li><a href=\"#\" class=\"open-Popup\" data-toggle=\"modal\" data-target=\"#PopOver\" id=\"".$vals['id']."\">Add Note</a></li>
                            </ul><hr/><b>Go to</b><ul class=list-unstyled>
                            <li><a href=\"../Profiles\">Profile</a></li>
                            <li><a href=\"../#\">Employment Information</a></li>
                            <li><a href=\"../#\">Notes</a></li>
                            <li><a href=\"../#\">Goal Plan</a></li>
                            <li><a href=\"#\">Others</a></li></ul></div>";
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


        });

        function onclickTerminate(id){
            if (confirm("Are you sure you want to terminate ?") == true) {
                $.ajax({
                    type: "get",
                    url: "../Actions/terminate/"+id,
                    data: {
                        Id:id
                       },
                    success: function (data){
                        alert(data);
                    },
                    error: function (xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                    }
                });
            }
            return false;
        }

        function addNote(){
            var id=document.getElementById("UID").value;
            var note=document.getElementById("notes").value;
               $.ajax({
                type: "get",
                url: "../Actions/addnote/"+id,
                data: {
                    Id:id,
                    Notes:note
                   },
                success: function (data){
                    alert(data);
                },
                error: function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
            return false;
         }

// called when popover shown
$(document).on("click", ".open-Popup", function () {
     document.getElementById('UID').value = $(this).attr("id");
});

    </script>
 <!-- hidden field -->
<input type="hidden" id="UID">

<div class="modal fade" id="PopOver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-aqua">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title tcenter" id="myModalLabel">Add Note</h4>
              </div>
              <div class="modal-body">
                  <div class='form-group'><label>Title:</label><br><input type="text"  id='ntitle' class='form-control' placeholder="Enter title"/></div>
                <div class='form-group'><label>Description:</label><br><textarea id='ndescription' class='form-control' placeholder="Enter description"></textarea></div>
                <div class='form-group'><label>Visible to:</label>
                    <div class="checkbox">
                        <label><input type="checkbox" name="nvisibleto" value="me">Me</label>
                        <label><input type="checkbox" name="nvisibleto" value="admin">Admin</label>
                        <label><input type="checkbox" name="nvisibleto" value="others">Others</label>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <input type="button" class="save-btn btn btn-info pull-right" value="Save changes" onclick="addNote()"/>
              </div>
          </div>
      </div>
  </div>
