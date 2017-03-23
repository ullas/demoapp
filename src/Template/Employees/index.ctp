<section class="content-header">
  <h1>
    Employees
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
  	
    <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section>


<section class="content">
	<div id="contentdiv">
		<?php foreach ($employees as $employee): ?>
			<div class='col-md-3'>
				<div class="box">
            <div class="box-body box-profile">
            	<?php $picturename='/img/uploadedpics/'.$employee['profilepicture'];
          					echo $this->Html->image($picturename, array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture')); ?>
			
			<a href="#" style="font-size:20px;margin-top:-100px;" class="open-Popup pull-left"><i class="fa fa-trash text-red"></i> <!-- Change Picture --></a>
            
			<a href="/Employees/edit/<?php echo $employee['id']; ?>" style="font-size:20px;margin-top:-100px;" class="open-Popup pull-right"><i class="fa fa-pencil"></i> <!-- Change Picture --></a>
             
              <h3 class="profile-username text-center"><?php if(isset($employee['empdatabiography']['birth_name'])){ echo $employee['empdatabiography']['birth_name']; }else{ echo "Birth Name"; } ?></h3>

              <p class="text-muted text-center"><?php if(isset($employee['jobinfo']['position_id'])){ echo $employee['jobinfo']['position_id']; }else{ echo "Software Engineer"; } ?></p>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            	<?=$this->Html->link(__('View'), ['action' => 'view', $employee['id']],['class'=>'btn btn-primary btn-block pull-right'], ['escape' => false])?>
            </div>
          </div>
			</div>
		<?php endforeach; ?>
	</div>
</section>