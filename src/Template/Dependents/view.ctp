<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Dependents
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
        <?= $this->Form->create($dependent, array('role' => 'form')) ?>
        <fieldset>
          <?php
           echo $this->Form->input('relationship_type',['disabled' => true]);
            echo $this->Form->input('is_accompanying_dependent',['disabled' => true]);
            echo $this->Form->input('is_beneficiary',['disabled' => true]);
            echo $this->Form->input('first_name',['disabled' => true]);
            echo $this->Form->input('last_name',['disabled' => true]);
            echo $this->Form->input('middle_name',['disabled' => true]);
            echo $this->Form->input('salutation',['disabled' => true]);
			echo $this->Form->input('date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('country_of_birth',['options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('card_type',['disabled' => true]);
            echo $this->Form->input('nationalid',['disabled' => true]);
            echo $this->Form->input('is_add_same_as_employee',['disabled' => true]);
            echo $this->Form->input('address_number',['disabled' => true]);
            echo $this->Form->input('visa',['disabled' => true]);
			echo $this->Form->input('visa_issue', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('visa_expiry', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('passport',['disabled' => true]);
            echo $this->Form->input('pass_issue', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('pass_expiry', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employed',['disabled' => true]);
            echo $this->Form->input('emp_since', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employer',['disabled' => true]);
            echo $this->Form->input('acco_entitlement',['disabled' => true]);
            echo $this->Form->input('legal_nominee',['disabled' => true]);
            echo $this->Form->input('degree',['disabled' => true]);
            echo $this->Form->input('specialization',['disabled' => true]);
            echo $this->Form->input('spouse_emplid',['disabled' => true]);
            echo $this->Form->input('leave_passage',['disabled' => true]);
            echo $this->Form->input('leave_passage_entitle',['disabled' => true]);
			
            echo $this->Form->input('head_of_unit',['disabled' => true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Dependent'), ['action' => 'edit', $dependent['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
