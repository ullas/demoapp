<?php echo $this->element('indexbasic', array('title' => 'Leave Types')); ?>
<?php $this->start('scriptIndexBottom'); ?>
<script>
  
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
        
        	// var my_td=$(this).children("td");
        	// var second_col = my_td.eq(1);
        	// alert(second_col.t());
        });
    });
    
    
    $("#mptlindextbl tr td:nth-child(2)").each(function () {
		// alert($(this));
	});
}
</script>

<?php $this->end(); ?>