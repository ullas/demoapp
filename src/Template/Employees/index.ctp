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

.
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
	<div id="contentdiv" class="griddiv box box-primary">
		<?php foreach ($employees as $employee): ?>
			<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view" style="width:100%;">
                          <div class="col-sm-12" style="height: 160px;">
                            <div class="left col-xs-8 text-muted">
                              <h3><?php if(isset($employee['empdatabiography']['birth_name'])){ echo $employee['empdatabiography']['birth_name']; }else{ echo "Birth Name"; } ?></h3>
                              <p> <?php if(isset($employee['jobinfo']['position_id'])){ echo $employee['jobinfo']['position_id']; }else{ echo "Software Engineer"; } ?> </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-4 text-center" style="">
                            	<?php if(isset($employee['profilepicture']) && ($employee['profilepicture']!='')){$picturename='/img/uploadedpics/'.$employee['profilepicture'];}
                            				else{$picturename='/img/uploadedpics/defaultuser.png';}
          					echo $this->Html->image($picturename, array('class' => 'img-responsive img-circle emppic', 'alt' => 'Employee picture')); ?>
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                            	<a href="#" class="btn btn-danger btn-xs pull-left"><i class="fa fa-trash bg-red"></i> </a>
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
	
});


</script>
<?php $this->end(); ?>