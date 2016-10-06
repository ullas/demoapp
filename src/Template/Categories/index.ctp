
<?php
function RecursiveCategories($array) {
 
    if (count($array)) {
            echo "\n<ul id='org' style='display:none'>\n";
        foreach ($array as $vals) {
			
			$htmlstr="<div id=mptl>Mptl</div>";
			
                    echo "<li id=\"".$vals['id']."\"><a href='#' tabindex='0' id='".$vals['id']."' class='popoverbtn' data-trigger='focus' data-html='true' data-toggle='popover' title='".$vals['name']."' data-content='".$htmlstr."'>".$vals['name'];
                    if (count($vals['children'])) {
                            RecursiveCategories($vals['children']);
                    }
                    echo "</a></li>\n";
        }
            echo "</ul>\n";
    }
} ?>

<?= RecursiveCategories($categories) ?>



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
    </script>
   <section class="content-header">
      <h1>
       Organization Chart
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-sitemap"></i> Organization Chart</li>
      </ol>
    </section>
<section class="content ">
	<div class="box box-primary"><div class="box-body"> 
    <div id="chart" class="orgChart"></div></div></div></section>
   <style>
   	.jOrgChart table {
margin: 0px auto;
}
.jOrgChart .node-img {
  background-image:url(/img/profile-icon.png);background-repeat: no-repeat;background-size: 100% 100%;
  width                 : 96px;
  height                : 96px;
 border-bottom:1px solid #ddd;
  margin:0px auto;
}
.jOrgChart .node{
	-webkit-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
              -moz-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
                         box-shadow: 0px 0px 10px rgba(0,0,0,.8);
}
.jOrgChart.node-cell{
	margin:0 10px;
}
.node-txt{
	background:#FFFFFF;
}
.node-expand{
	width                 : 96px;
  height                : 20px;
  background:#ddd;
}
.nodeexp{background-image:url(/img/uparrow.png);background-repeat: no-repeat;}
.nodehide{background-image:url(/img/downarrow.png);background-repeat: no-repeat;}
.dnone{display: none;}
   </style> 
