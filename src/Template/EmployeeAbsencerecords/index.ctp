<div class="box-body" >
	<div class="row">
	
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-list"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Requested</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Approved</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Rejected</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>
        
	</div>
</div>     

<style>
.border-right {
    border-right: 1px solid #FFFFFF;
}
</style>


<?php echo $this->element('indexbasic', array('title' => 'Leave Requests')); ?>