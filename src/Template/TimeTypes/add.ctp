<section class="content-header">
      <h1>
       Time Type
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($timeType) ?>
    <fieldset>
        <legend><?= __('Add Time Type') ?></legend>
        <?php
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('classification');
            echo $this->Form->input('unit');
            echo $this->Form->input('perm_fractions_days');
            echo $this->Form->input('workflow');
            echo $this->Form->input('perm_fractions_hours');
            echo $this->Form->input('calc_base');
            echo $this->Form->input('flex_req_allow');
            echo $this->Form->input('time_acc_type');
            echo $this->Form->input('take_rule');
            echo $this->Form->input('code');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
