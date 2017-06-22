<section class="content-header">
  <h1>
    Pay Component Groups
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
  	
    <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section>
<?php echo $this->element('indexbasic', array('title' => 'Pay Component Groups')); ?>

<?php $this->start('scriptIndexBottom'); ?>
<script>

function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){var dataid=$(this).attr('data-id');
       $("#ajax_button").html("<form name='formdelete' id='formdelete"+dataid+"' method='post'  action='/<?php echo $this->request->params['controller'] ?>/delete/"+dataid+"' style='display:none;'><input type='hidden' name='_method' value='POST'></form><a href='#' onclick='document.getElementById(&quot;formdelete"+dataid+"&quot;).submit();' class='btn btn-outline'>Confirm</a>");
      $("#trigger").click();
    });

    $("#mptlindextbl tbody").find('tr').each(function () {

    	

    	$(this).find('td').each (function() {
        var innerHtml=$(this).find('div.mptldtbool').html();
        // true/false instead of 1/0
        (innerHtml=="1" || innerHtml=="True") ? $(this).find('div.mptldtbool').html("Active") : $(this).find('div.mptldtbool').html("Inactive");
        });
    });
}


</script>
<?php $this->end(); ?>