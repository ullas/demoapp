<section class="content-header">
      <h1>
        Calendar Assignments
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($calendarAssignment) ?>
    <fieldset>
        <legend><?= __('Edit Calendar Assignment') ?></legend>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('assignmentyear');
            echo $this->Form->input('assignmentdate', ['empty' => true]);
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('holiday_id', ['options' => $holidays, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
