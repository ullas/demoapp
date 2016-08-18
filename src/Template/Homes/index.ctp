<div class="container">
  <div class="row mt30">
    <div class="col-sm-3">
      <?= $this->element('homeelmt', array('title' => 'My Info')); ?>
    </div>
    <div class="col-sm-3">
      <?= $this->element('homeelmt', array('title' => 'MyTeam')); ?>
    </div>
    <div class="col-sm-3">
      <?= $this->element('homeelmt', array('title' => 'Links')); ?>
    </div>
    <div class="col-sm-3">
      <?= $this->element('homeelmt', array('title' => 'Admin Alerts')); ?>
    </div>
  </div>
  
  <div class="row mt30">
    <div class="col-sm-6">
      <?= $this->element('homeelmt', array('title' => 'To Do')); ?>
    </div>
    <div class="col-sm-3">
      <?= $this->element('homeelmt', array('title' => 'Alerts')); ?>
    </div>
    <div class="col-sm-3">
      <?= $this->element('homeelmt', array('title' => 'My Admin Favorites')); ?>
    </div>
  </div>
  
</div>