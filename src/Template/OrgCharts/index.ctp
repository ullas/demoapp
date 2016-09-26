
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
    
