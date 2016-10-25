
<div class="topbar">
        <div class="topbar-inner">
        </div>
    </div>
    <ul id="org" style="display:none">
    <li>
       Project manager
       <ul>
         <li id="beer">System Administrator</li>
         <li>Technical
           <ul>
             <li>Fac</li>
             <li> Aubergine</li>
           </ul>
         </li>
         <li class="fruit">Training
           <ul>
             <li>Communication
               <ul>
                 <li>Granny Smith</li>
               </ul>
             </li>
             <li>Berries
               <ul>
                 <li>Jacob</li>
                 <li>David</li>
               </ul>
             </li>
           </ul>
         </li>
         <li class="collapsed">Functional Operational
           <ul>
             <li>Topdeck</li>
             <li>Reese's Cups</li>
           </ul>
         </li>
       </ul>
     </li>
   </ul>
            
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
                
                prettyPrint();                
            });
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
.popover-content {
	width:300px;
    /*font-size: 14px;*/
}
.node-desc{
}
   </style>   
