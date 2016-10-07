<style>
.panel-body{
	height:250px;
}	
</style>

    	
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Home</h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Home</li>
      </ol>
    </section>
    
    
    <section class="content">
    <div id="draggablePanelList" class="list-unstyled row">
			
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Info</div>
        	<div class="panel-body bg-light-blue-gradient"><?= $this->element('homeelmt', array('title' => 'My Info')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Team</div>
        	<div class="panel-body box-body"><?= $this->element('homeelmt', array('title' => 'My Team')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="panel-heading">Links</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'Links')); ?></div>
        </div>
    </div>
    
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">Admin Alerts</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'Admin Alerts')); ?></div>
        </div>
    </div>
    
    <div class="col-sm-6">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">To Do</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'To Do')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Goals</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'My Goals')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Admin Favorites</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'My Admin Favorites')); ?></div>
        </div>
    </div>

</div>

  
  
</section>

<?php $this->start('scriptBotton'); ?>
<script>
 jQuery(function($) {
        var panelList = $('#draggablePanelList');

        panelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.box-header', 
            update: function() {
                $('.box', panelList).each(function(index, elem) {
                     var $listItem = $(elem),
                         newIndex = $listItem.index();

                     // Persist the new indices.
                });
            }
        });
        
  });
</script>
<?php $this->end(); ?>