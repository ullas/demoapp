<section class="content-header">
  <h1>
    Leave Requests
    <small>List</small>
  </h1>
  <ol class="breadcrumb">

    <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section>

<section class="collapse in" id="infobar" style="margin-top:20px;" aria-expanded="true">
	<div class="clearfix">
	
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
          	<span class="info-box-icon"><i class="fa fa-list"></i></span>
            <div class=" infodiv info-box-content">
              <span class="info-box-text dd">Requested</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  bg-green">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">Approved</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  bg-red">
            <span class="info-box-icon"><i class="fa fa-times"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">Rejected</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>
        
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>
              <p>Rejected</p>
            </div>
          </div>
        </div> -->
        
	</div>
</section>
	

<?php echo $this->element('indexbasic', array('title' => 'Leave Requests')); ?>