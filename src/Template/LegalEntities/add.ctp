
<div class="container">
	
	
	
    <?= $this->Form->create($legalEntity) ?>
    <fieldset>
        <legend><?= __('Add Legal Entity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo $this->Form->input('default_pay_group');
            echo $this->Form->input('country_of_registration');
            echo $this->Form->input('standard_weekly_hours');
            echo $this->Form->input('currency');
            echo $this->Form->input('official_language');
            echo $this->Form->input('external_code');
            echo $this->Form->input('location_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
