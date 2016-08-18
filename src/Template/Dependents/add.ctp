<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dependents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dependents form large-9 medium-8 columns content">
    <?= $this->Form->create($dependent) ?>
    <fieldset>
        <legend><?= __('Add Dependent') ?></legend>
        <?php
            echo $this->Form->input('relationship_type');
            echo $this->Form->input('is_accompanying_dependent');
            echo $this->Form->input('is_beneficiary');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('salutation');
            echo $this->Form->input('date_of_birth', ['empty' => true]);
            echo $this->Form->input('country_of_birth');
            echo $this->Form->input('country');
            echo $this->Form->input('card_type');
            echo $this->Form->input('nationalid');
            echo $this->Form->input('is_add_same_as_employee');
            echo $this->Form->input('address_number');
            echo $this->Form->input('visa');
            echo $this->Form->input('visa_issue', ['empty' => true]);
            echo $this->Form->input('visa_expiry', ['empty' => true]);
            echo $this->Form->input('passport');
            echo $this->Form->input('pass_issue', ['empty' => true]);
            echo $this->Form->input('pass_expiry', ['empty' => true]);
            echo $this->Form->input('employed');
            echo $this->Form->input('emp_since', ['empty' => true]);
            echo $this->Form->input('employer');
            echo $this->Form->input('acco_entitlement');
            echo $this->Form->input('legal_nominee');
            echo $this->Form->input('degree');
            echo $this->Form->input('specialization');
            echo $this->Form->input('spouse_emplid');
            echo $this->Form->input('leave_passage');
            echo $this->Form->input('leave_passage_entitle');
            echo $this->Form->input('person_id_external');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
