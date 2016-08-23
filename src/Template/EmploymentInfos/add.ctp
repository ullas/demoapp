<section class="content-header">
      <h1>
        Employment Info
                <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($employmentInfo) ?>
    <fieldset>
        <?php
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('first_date_worked', ['empty' => true]);
            echo $this->Form->input('original_start_date', ['empty' => true]);
            echo $this->Form->input('company');
            echo $this->Form->input('is_primary');
            echo $this->Form->input('seniority_date', ['empty' => true]);
            echo $this->Form->input('benefits_eligibility_start_date', ['empty' => true]);
            echo $this->Form->input('prev_employeeid');
            echo $this->Form->input('eligible_for_stock');
            echo $this->Form->input('service_date', ['empty' => true]);
            echo $this->Form->input('initial_stock_grant');
            echo $this->Form->input('initial_option_grant');
            echo $this->Form->input('job_credit');
            echo $this->Form->input('notes');
            echo $this->Form->input('is_contingent_worker');
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('ok_to_rehire');
            echo $this->Form->input('pay_roll_end_date', ['empty' => true]);
            echo $this->Form->input('last_date_worked', ['empty' => true]);
            echo $this->Form->input('regret_termination');
            echo $this->Form->input('eligible_for_sal_continuation');
            echo $this->Form->input('bonus_pay_expiration_date', ['empty' => true]);
            echo $this->Form->input('stock_end_date', ['empty' => true]);
            echo $this->Form->input('salary_end_date', ['empty' => true]);
            echo $this->Form->input('benefits_end_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
