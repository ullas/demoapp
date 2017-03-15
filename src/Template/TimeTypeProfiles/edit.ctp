<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Time Type Profile
        <small>Edit</small>
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
            echo $this->Form->input('external_code');
            echo $this->Form->input('code',['label' => 'Time Type Profile Code']);
            echo $this->Form->input('name',['label' => 'Time Type Profile Name']);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('start_date',['label' => 'Time Type Profile Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_rec_variant',['label' => 'Time Recording Variant']);
            echo $this->Form->input('time_type_id', ['options' => $timeTypes, 'empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('enable_ess',['label' => 'Enable for ESS']);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update'),['title'=>'Update','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>
