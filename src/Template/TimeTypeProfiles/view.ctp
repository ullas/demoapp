<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Time Account Profile
        <small>View</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($timeTypeProfile) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['disabled' => true]);
            echo $this->Form->input('code',['disabled' => true]);
            echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('time_rec_variant',['disabled' => true]);
            echo $this->Form->input('status',['disabled' => true]);
            echo $this->Form->input('enable_ess',['disabled' => true]);
            echo $this->Form->input('time_type_id', ['options' => $timeTypes, 'empty' => true,'disabled' => true]);
            
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?=$this->Html->link(__('Edit'), ['action' => 'edit', $timeTypeProfile['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>