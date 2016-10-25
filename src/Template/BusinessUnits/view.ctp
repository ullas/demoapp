<style>
label.mandatory:after {
    content: ' *';
    color: #ff5a4d;
    display: inline;
}
</style>
<section class="content-header">
  <h1>
    Business Unit
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
        <?= $this->Form->create($businessUnit, array('role' => 'form')) ?>
          <?php
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('name', ['label'=>['text'=>'Name','class'=>'mandatory'],'placeholder' => $businessUnit->name, 'disabled' => true]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('description', ['placeholder' => $businessUnit->description, 'disabled' => true]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('effective_status', ['placeholder' => $businessUnit->effective_status, 'disabled' => true]);
            echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'><label>Effective Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_start_date' disabled=true></div></div>";
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'><label>Effective End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_end_date' disabled=true></div></div>";
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('external_code', ['label'=>['text'=>'External Code','class'=>'mandatory'],'placeholder' => $businessUnit->external_code, 'disabled' => true]);
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo $this->Form->input('head_of_unit', ['placeholder' => $businessUnit->head_of_unit, 'disabled' => true]);
            echo "</div>";
            echo "</div>";
          ?>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save Business Unit'),['class'=>'pull-right']) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div>
</section>
