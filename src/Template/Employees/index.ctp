<style>
.griddiv {
    position: relative;
    /*background: #fff;*/
    /*border: 1px solid #f4f4f4;*/
    padding: 20px;
    /*margin: 10px 25px;*/
    clear:both;
    display: inline-block;
}
.emppic{
	margin-top: 10px;
    padding: 10px;
    max-height: 130px;
}
.profile_details{
	min-width:230px;
	/*background-color:#FFFFFF;*/}
.profile_details .profile_view .bottom {
    background: #F2F5F7;
    padding: 9px 0;
    border-top: 1px solid #E6E9ED;
}
.profile_details .profile_view {
    display: inline-block;
    padding: 10px 0 0;
    background: #fff;
}
.well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
.profile_details .profile_view .img-circle {
    border: 1px solid #777;
    padding: 2px;
}
.btn, .buttons, .modal-footer .btn+.btn, button {
    margin-bottom: 5px;
    margin-right: 5px;
}

#gridsection{
  margin-top:10px
}
</style>

<section class="content-header">
  <h1>
    Employees
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
  	<a class="btn btn-sm btn-success btn-flat gridbtn"><i class="fa fa-th"></i> </a>
  	<a class="btn btn-sm btn-success btn-flat dtbtn"><i class="fa fa-list"></i> </a>
  	<?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section>


<section class="content" id="gridsection" >
	
	<div class="box-tools pull-right"style="margin-bottom:15px;" >
		
		<a class="btn btn-sm btn-success btn-flat mptlascbtn"><i class="fa fa-sort-alpha-asc"></i> </a>
  		<a class="btn btn-sm btn-success btn-flat mptldescbtn"><i class="fa fa-sort-alpha-desc"></i> </a>
  		
                <div class="has-feedback" style="float: left;margin-right: 10px;">
                  <input type="text" id="empsearch"  onkeyup="searchemployee()"  class="form-control input-sm" placeholder="Search...">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
  		
    </div>
    
  		              
	<div id="contentdiv" class="griddiv box box-primary">
		<?php foreach ($employees as $employee): ?>
			<div class="col-md-4 col-sm-4 col-xs-12 profile_details" style="display:none;">
                        <div class="well profile_view" style="width:100%;">
                          <div class="col-sm-12" style="height: 160px; overflow-y:scroll;">
                            <div class="left col-xs-8 text-muted">
                              <h3 class="emptitle"><?php echo $employee['empdatapersonal']['first_name']." ".$employee['empdatapersonal']['middle_name']." ".$employee['empdatapersonal']['last_name']; ?></h3>
                              <p> <?php if(isset($employee['empdatabiography']['position_id'])){ echo $employee['empdatabiography']['position']['name']; }else{ echo "Position"; } ?> </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php if(isset($employee['address'])){ echo $employee['address']['address1'];}?><br/>
                                	 <?php
                                          if(isset($employee['address'])){
                                              echo ($employee['address']['city']);
                                          }
                                      ?>
                                 </li>
                                <li><i class="fa fa-phone"></i> Phone #: <?php if(isset($employee['contact_info']['phone'])){ echo $employee['contact_info']['phone']; } ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-4 text-center">
                            	<?php if(isset($employee['profilepicture']) && ($employee['profilepicture']!='')){$picturename=$employee['profilepicture'];}
                            				else{$picturename='/img/uploadedpics/defaultuser.png';}
											if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
												echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'img-responsive img-circle emppic', 'id'=>'profilepic', 'alt' => 'User profile picture'));
											}else{
												echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'img-responsive img-circle emppic', 'alt' => 'User profile picture'));
											}
							   ?>
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">

                            	<form name="formdelete" id="formdelete<?php echo $employee['id']; ?>" method="post" action="/Employees/delete/<?php echo $employee['id']; ?>" style="display:none;" >
                                   <input type="hidden" name="_method" value="POST"></form>
                               	<a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete employee # '<?php echo $employee['id']; ?>'?&quot; , function(){ document.getElementById(&quot;formdelete<?php echo $employee['id']; ?>&quot;).submit(); })
                                    event.returnValue = false; return false;" class="btn btn-danger btn-xs pull-left"><i class="fa fa-trash"></i> </a>

                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <a href="/Employees/edit/<?php echo $employee['id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </a>
                              <a href="/Employees/view/<?php echo $employee['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-user"> </i> View Profile</a>
                            </div>
                          </div>
                        </div>
                      </div>
		<?php endforeach; ?>
	</div>
</section>
<div id="dtsection" style="display: none;">
	<?php echo $this->element('indexbasic'); ?>
</div>

<?php $this->start('scriptIndexBottom'); ?>

<script>
$(function () {

	$('.gridbtn').click(function(){
		$('#gridsection').show();
		$('#dtsection').hide();
	});
	$('.dtbtn').click(function(){
		$('#gridsection').hide();
    	$('#dtsection').show();
	});

	$(window).on('beforeunload', function(){
  		$(window).scrollTop(0);
	});

	$(".profile_details").slice(0, 10).show();
	$(window).bind('scroll', function() {
    	if($(window).scrollTop() >= $('.griddiv').offset().top + $('.griddiv').outerHeight() - window.innerHeight) {
        	$(".profile_details:hidden").slice(0, 10).slideDown();
    	}
	});
	
	$('.mptlascbtn').click(function(){
		$(".profile_details").show();
		$('#contentdiv .profile_details').sort(function(a, b) {
 		 if ($(a).find(".emptitle").text().toUpperCase() < $(b).find(".emptitle").text().toUpperCase()){  return -1; }else{ return 1; }
		}).appendTo('#contentdiv');
	});
	
	$('.mptldescbtn').click(function(){
		$(".profile_details").show();
		$('#contentdiv .profile_details').sort(function(a, b) {
  			if ($(a).find(".emptitle").text().toUpperCase() > $(b).find(".emptitle").text().toUpperCase()){ return -1; }else{ return 1; } 
  		}).appendTo('#contentdiv');
	});
	

});


function searchemployee(){
	// $(".mptlpanel").hide();
	var input = document.getElementById('empsearch');
    var filter = input.value.toUpperCase();


	$('.profile_details').each(function(){
		// console.log($(this).attr("id"));
		var selectedcontrol=$(this);
		var a = $(this).find(".emptitle").text();
        if (a.toUpperCase().indexOf(filter) > -1) {
            selectedcontrol.show();
        } else {
            selectedcontrol.hide();
        }
	});

}
</script>
<?php $this->end(); ?>
