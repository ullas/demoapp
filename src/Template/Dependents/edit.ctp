<section class="content-header">
      <h1>
        Dependents
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($dependent) ?>
    <fieldset>
        <legend><?= __('Edit Dependent') ?></legend>
        <?php
            echo $this->Form->input('relationship_type');
            echo $this->Form->input('is_accompanying_dependent');
            echo $this->Form->input('is_beneficiary');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('salutation');
			echo "<div class='form-group'><label>Date of Birth:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='date_of_birth'></div></div>";
            echo $this->Form->input('country_of_birth',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('card_type');
            echo $this->Form->input('nationalid');
            echo $this->Form->input('is_add_same_as_employee');
            echo $this->Form->input('address_number');
            echo $this->Form->input('visa');
			echo $this->Form->input('visa_issue', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('visa_expiry', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('passport');
            echo $this->Form->input('pass_issue', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pass_expiry', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employed');
            echo $this->Form->input('emp_since', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employer');
            echo $this->Form->input('acco_entitlement');
            echo $this->Form->input('legal_nominee');
            echo $this->Form->input('degree');
            echo $this->Form->input('specialization');
            echo $this->Form->input('spouse_emplid');
            echo $this->Form->input('leave_passage');
            echo $this->Form->input('leave_passage_entitle');
            echo $this->Form->input('emp_data_biographies_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>

