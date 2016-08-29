<section class="content-header">
      <h1>
        Employment Info
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($employmentInfo) ?>
    <fieldset>
        <legend><?= __('Edit Employment Info') ?></legend>
        <?php
            echo "<div class='form-group'><label>Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='start_date'></div></div>";
			echo "<div class='form-group'><label>First Date Worked:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='first_date_worked'></div></div>";
			echo "<div class='form-group'><label>Original Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='original_start_date'></div></div>";
            echo $this->Form->input('company');
            echo $this->Form->input('is_primary');
			echo "<div class='form-group'><label>Seniority Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='seniority_date'></div></div>";
			echo "<div class='form-group'><label>Benefits Eligibility Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='benefits_eligibility_start_date'></div></div>";
            echo $this->Form->input('prev_employeeid');
            echo $this->Form->input('eligible_for_stock');
			echo "<div class='form-group'><label>Service Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='service_date'></div></div>";
            echo $this->Form->input('initial_stock_grant');
            echo $this->Form->input('initial_option_grant');
            echo $this->Form->input('job_credit');
            echo $this->Form->input('notes');
            echo $this->Form->input('is_contingent_worker');
            echo "<div class='form-group'><label>End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='end_date'></div></div>";
            echo $this->Form->input('ok_to_rehire');
			echo "<div class='form-group'><label>Pay Roll End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='pay_roll_end_date'></div></div>";
			echo "<div class='form-group'><label>Last Date Worked:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='last_date_worked'></div></div>";
            echo $this->Form->input('regret_termination');
            echo $this->Form->input('eligible_for_sal_continuation');
            echo "<div class='form-group'><label>Bonus Pay Expiration Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='bonus_pay_expiration_date'></div></div>";
			echo "<div class='form-group'><label>Stock End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='stock_end_date'></div></div>";
			echo "<div class='form-group'><label>Salary End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='salary_end_date'></div></div>";
            echo "<div class='form-group'><label>Benefits End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='benefits_end_date'></div></div>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
<!-- Date picker -->
<?php
$this->Html->css([  'AdminLTE./plugins/datepicker/datepicker3' ], ['block' => 'css']);
$this->Html->script([ 'AdminLTE./plugins/datepicker/bootstrap-datepicker' ], ['block' => 'script']); ?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () { 
  	 $('#start_date').datepicker({ autoclose: true }); 
     $('#first_date_worked').datepicker({ autoclose: true }); 
     $('#original_start_date').datepicker({ autoclose: true }); 
     $('#seniority_date').datepicker({ autoclose: true }); 
     $('#benefits_eligibility_start_date').datepicker({ autoclose: true }); 
     $('#service_date').datepicker({ autoclose: true }); 
     $('#end_date').datepicker({ autoclose: true }); 
     $('#pay_roll_end_date').datepicker({ autoclose: true }); 
     $('#last_date_worked').datepicker({ autoclose: true }); 
     $('#bonus_pay_expiration_date').datepicker({ autoclose: true }); 
     $('#stock_end_date').datepicker({ autoclose: true }); 
     $('#salary_end_date').datepicker({ autoclose: true }); 
     $('#benefits_end_date').datepicker({ autoclose: true }); 
  });
</script>
<?php $this->end(); ?>
