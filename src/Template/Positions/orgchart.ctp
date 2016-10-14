
<?php
function RecursiveCategories($array) {
 
    if (count($array)) {
            echo "\n<ul id='org' style='display:none'>\n";
        foreach ($array as $vals) {
			
			$htmlstr="<div id=mptl><dd>Actions</dd><ul class=list-unstyled>
							<li><a href=\"#\" onclick=\"onclickTerminate(".$vals['id'].");\">Terminate</a></li>
							<li><a href=\"#\" onclick=\"onclickTerminate(".$vals['id'].");\">Job Change</a></li>
							<li><a href=\"#\" onclick=\"onclickTerminate(".$vals['id'].");\">Employment Details</a></li></ul>
							<div class=uline></div>
							<dd>Go to</dd><ul class=list-unstyled><li><a href=\"../Profiles\">Profile</a></li>
							<li><a href=\"linkaddress\">Link</a></li></ul></div>";
			
                    echo "<li id=\"".$vals['id']."\"><a href='#' tabindex='0' id='".$vals['id']."' class='popoverbtn' data-trigger='focus' data-html='true' data-toggle='popover' title='".$vals['name']."'
                     		 data-content='".$htmlstr."'>".$vals['name'];
                    if (count($vals['children'])) {
                            RecursiveCategories($vals['children']);
                    }
                    echo "</a></li>\n";
        }
            echo "</ul>\n";
    }
} ?>

<?= RecursiveCategories($orgpositions) ?>



<script>
    jQuery(document).ready(function() {
        $("#org").jOrgChart({
            chartElement : '#chart',
            dragAndDrop  : false
        });
    });
    </script>
    <script>
        jQuery(document).ready(function() {
            
            /* Custom jQuery for the example */
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
            });
            
            $('#list-html').text($('#org').html());
            
            $("#org").bind("DOMSubtreeModified", function() {
                $('#list-html').text('');
                
                $('#list-html').text($('#org').html());
                
                // prettyPrint();                
            });
            
            
            //Maptell
            
            // $('<div class="node-img"></div>').appendTo('td.node-cell');
            
            //popover
            $('[data-toggle="popover"]').popover();
            
    
        });
        
        function onclickTerminate(id){
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
    		return false;
        }
    </script>
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
   <style>
   	.jOrgChart table {
margin: 0px auto;
}
.jOrgChart .node-img {
	background: #f0f0f0; 
  background-image:url(/img/profile-icon.png);background-repeat: no-repeat;background-size: 100% 100%;
  width                 : 96px;
  height                : 96px;
 border-right:1px solid #ddd;
 float:left;
  /*margin:0px auto;*/
}
.jOrgChart .node{
	-webkit-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
    -moz-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
    box-shadow: 0px 0px 10px rgba(0,0,0,.8);
}
.jOrgChart.node-cell{
	margin:0 10px;
}
.node-title{
	background:#FFFFFF;
	width:140px;
	text-align:left;margin-left:5px;margin-bottom:15px;
	float:left;
}
.node-expand{
	float:left;
	width                 : 250px;
  height                : 18px;
  border-top:1px solid #eee;
}
.nodeexp{background:url(/img/uparrow.png) no-repeat center;}
.nodehide{background:url(/img/downarrow.png) no-repeat center;}
.dnone{display: none;}
.popover-title {
	background:#3d8db8;
    color: #FFFFFF;
    font-size: 15px;text-align:center;font-weight: bold;
}
.popover{
	width:300px;
}
.popover-content {
	
	color:#777;font-weight: normal;
    font-size: 14px;
    background:#f0f0f0;
}
.popover-content a{
	color:#555;font-size: 12px;text-align:left;font-weight: bold;margin-left:5px;
}
.popover-content a:hover {
    color: #3d8db8;
}
.node-desc{
}
.uline{
	height:2px;width:100%;background:#FFFFFF;margin:10px;
}
   </style> 
