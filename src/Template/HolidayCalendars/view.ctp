<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Holiday Clendar
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
        <?= $this->Form->create($holidayCalendar, array('role' => 'form')) ?>
        <fieldset>
          <?php
             echo $this->Form->input('calendar',['disabled' => true]);
             echo $this->Form->input('name',['disabled' => true]);
             echo $this->Form->input('country',['disabled' => true]);
             echo $this->Form->input('valid_from', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			 echo $this->Form->input('valid_to', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit HolidayClendar'), ['action' => 'edit', $holidayCalendar['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
