<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'EmpDataBiographies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'EmpDataBiographies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emp Data Personals'), ['controller' => 'EmpDataPersonals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emp Data Personal'), ['controller' => 'EmpDataPersonals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employment Infos'), ['controller' => 'EmploymentInfos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employment Info'), ['controller' => 'EmploymentInfos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($employee->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($employee->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Data Biography Id') ?></th>
            <td><?= $this->Number->format($employee->emp_data_biography_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Data Personal Id') ?></th>
            <td><?= $this->Number->format($employee->emp_data_personal_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Employment Info Id') ?></th>
            <td><?= $this->Number->format($employee->employment_info_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Emp Data Biographies') ?></h4>
        <?php if (!empty($employee->emp_data_biographies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Date Of Birth') ?></th>
                <th><?= __('Country Of Birth') ?></th>
                <th><?= __('Region Of Birth') ?></th>
                <th><?= __('Place Of Birth') ?></th>
                <th><?= __('Birth Name') ?></th>
                <th><?= __('Date Of Death') ?></th>
                <th><?= __('Person Id External') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Employee Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->emp_data_biographies as $empDataBiographies): ?>
            <tr>
                <td><?= h($empDataBiographies->id) ?></td>
                <td><?= h($empDataBiographies->date_of_birth) ?></td>
                <td><?= h($empDataBiographies->country_of_birth) ?></td>
                <td><?= h($empDataBiographies->region_of_birth) ?></td>
                <td><?= h($empDataBiographies->place_of_birth) ?></td>
                <td><?= h($empDataBiographies->birth_name) ?></td>
                <td><?= h($empDataBiographies->date_of_death) ?></td>
                <td><?= h($empDataBiographies->person_id_external) ?></td>
                <td><?= h($empDataBiographies->customer_id) ?></td>
                <td><?= h($empDataBiographies->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EmpDataBiographies', 'action' => 'view', $empDataBiographies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EmpDataBiographies', 'action' => 'edit', $empDataBiographies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmpDataBiographies', 'action' => 'delete', $empDataBiographies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empDataBiographies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Emp Data Personals') ?></h4>
        <?php if (!empty($employee->emp_data_personals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Salutation') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Initials') ?></th>
                <th><?= __('Middle Name') ?></th>
                <th><?= __('First Name Alt1') ?></th>
                <th><?= __('Middle Name Alt1') ?></th>
                <th><?= __('Last Name Alt1') ?></th>
                <th><?= __('First Name Alt2') ?></th>
                <th><?= __('Middle Name Alt2') ?></th>
                <th><?= __('Last Name Alt2') ?></th>
                <th><?= __('Display Name') ?></th>
                <th><?= __('Formal Name') ?></th>
                <th><?= __('Birth Name') ?></th>
                <th><?= __('Birth Name Alt1') ?></th>
                <th><?= __('Birth Name Alt2') ?></th>
                <th><?= __('Preferred Name') ?></th>
                <th><?= __('Display Name Alt1') ?></th>
                <th><?= __('Display Name Alt2') ?></th>
                <th><?= __('Formal Name Alt1') ?></th>
                <th><?= __('Formal Name Alt2') ?></th>
                <th><?= __('Name Format') ?></th>
                <th><?= __('Is Overridden') ?></th>
                <th><?= __('Nationality') ?></th>
                <th><?= __('Second Nationality') ?></th>
                <th><?= __('Third Nationality') ?></th>
                <th><?= __('Wps Code') ?></th>
                <th><?= __('Uniqueid') ?></th>
                <th><?= __('Prof Legal') ?></th>
                <th><?= __('Exclude Legal') ?></th>
                <th><?= __('Nationality Date') ?></th>
                <th><?= __('Home Airport') ?></th>
                <th><?= __('Religion') ?></th>
                <th><?= __('Number Children') ?></th>
                <th><?= __('Disability Date') ?></th>
                <th><?= __('Disable Group') ?></th>
                <th><?= __('Disable Degree') ?></th>
                <th><?= __('Disable Type') ?></th>
                <th><?= __('Disable Authority') ?></th>
                <th><?= __('Disable Ref') ?></th>
                <th><?= __('Person Id External') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Employee Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->emp_data_personals as $empDataPersonals): ?>
            <tr>
                <td><?= h($empDataPersonals->id) ?></td>
                <td><?= h($empDataPersonals->salutation) ?></td>
                <td><?= h($empDataPersonals->first_name) ?></td>
                <td><?= h($empDataPersonals->last_name) ?></td>
                <td><?= h($empDataPersonals->initials) ?></td>
                <td><?= h($empDataPersonals->middle_name) ?></td>
                <td><?= h($empDataPersonals->first_name_alt1) ?></td>
                <td><?= h($empDataPersonals->middle_name_alt1) ?></td>
                <td><?= h($empDataPersonals->last_name_alt1) ?></td>
                <td><?= h($empDataPersonals->first_name_alt2) ?></td>
                <td><?= h($empDataPersonals->middle_name_alt2) ?></td>
                <td><?= h($empDataPersonals->last_name_alt2) ?></td>
                <td><?= h($empDataPersonals->display_name) ?></td>
                <td><?= h($empDataPersonals->formal_name) ?></td>
                <td><?= h($empDataPersonals->birth_name) ?></td>
                <td><?= h($empDataPersonals->birth_name_alt1) ?></td>
                <td><?= h($empDataPersonals->birth_name_alt2) ?></td>
                <td><?= h($empDataPersonals->preferred_name) ?></td>
                <td><?= h($empDataPersonals->display_name_alt1) ?></td>
                <td><?= h($empDataPersonals->display_name_alt2) ?></td>
                <td><?= h($empDataPersonals->formal_name_alt1) ?></td>
                <td><?= h($empDataPersonals->formal_name_alt2) ?></td>
                <td><?= h($empDataPersonals->name_format) ?></td>
                <td><?= h($empDataPersonals->is_overridden) ?></td>
                <td><?= h($empDataPersonals->nationality) ?></td>
                <td><?= h($empDataPersonals->second_nationality) ?></td>
                <td><?= h($empDataPersonals->third_nationality) ?></td>
                <td><?= h($empDataPersonals->wps_code) ?></td>
                <td><?= h($empDataPersonals->uniqueid) ?></td>
                <td><?= h($empDataPersonals->prof_legal) ?></td>
                <td><?= h($empDataPersonals->exclude_legal) ?></td>
                <td><?= h($empDataPersonals->nationality_date) ?></td>
                <td><?= h($empDataPersonals->home_airport) ?></td>
                <td><?= h($empDataPersonals->religion) ?></td>
                <td><?= h($empDataPersonals->number_children) ?></td>
                <td><?= h($empDataPersonals->disability_date) ?></td>
                <td><?= h($empDataPersonals->disable_group) ?></td>
                <td><?= h($empDataPersonals->disable_degree) ?></td>
                <td><?= h($empDataPersonals->disable_type) ?></td>
                <td><?= h($empDataPersonals->disable_authority) ?></td>
                <td><?= h($empDataPersonals->disable_ref) ?></td>
                <td><?= h($empDataPersonals->person_id_external) ?></td>
                <td><?= h($empDataPersonals->customer_id) ?></td>
                <td><?= h($empDataPersonals->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EmpDataPersonals', 'action' => 'view', $empDataPersonals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EmpDataPersonals', 'action' => 'edit', $empDataPersonals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmpDataPersonals', 'action' => 'delete', $empDataPersonals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empDataPersonals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Employment Infos') ?></h4>
        <?php if (!empty($employee->employment_infos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('First Date Worked') ?></th>
                <th><?= __('Original Start Date') ?></th>
                <th><?= __('Company') ?></th>
                <th><?= __('Is Primary') ?></th>
                <th><?= __('Seniority Date') ?></th>
                <th><?= __('Benefits Eligibility Start Date') ?></th>
                <th><?= __('Prev Employeeid') ?></th>
                <th><?= __('Eligible For Stock') ?></th>
                <th><?= __('Service Date') ?></th>
                <th><?= __('Initial Stock Grant') ?></th>
                <th><?= __('Initial Option Grant') ?></th>
                <th><?= __('Job Credit') ?></th>
                <th><?= __('Notes') ?></th>
                <th><?= __('Is Contingent Worker') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Ok To Rehire') ?></th>
                <th><?= __('Pay Roll End Date') ?></th>
                <th><?= __('Last Date Worked') ?></th>
                <th><?= __('Regret Termination') ?></th>
                <th><?= __('Eligible For Sal Continuation') ?></th>
                <th><?= __('Bonus Pay Expiration Date') ?></th>
                <th><?= __('Stock End Date') ?></th>
                <th><?= __('Salary End Date') ?></th>
                <th><?= __('Benefits End Date') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Employee Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->employment_infos as $employmentInfos): ?>
            <tr>
                <td><?= h($employmentInfos->id) ?></td>
                <td><?= h($employmentInfos->start_date) ?></td>
                <td><?= h($employmentInfos->first_date_worked) ?></td>
                <td><?= h($employmentInfos->original_start_date) ?></td>
                <td><?= h($employmentInfos->company) ?></td>
                <td><?= h($employmentInfos->is_primary) ?></td>
                <td><?= h($employmentInfos->seniority_date) ?></td>
                <td><?= h($employmentInfos->benefits_eligibility_start_date) ?></td>
                <td><?= h($employmentInfos->prev_employeeid) ?></td>
                <td><?= h($employmentInfos->eligible_for_stock) ?></td>
                <td><?= h($employmentInfos->service_date) ?></td>
                <td><?= h($employmentInfos->initial_stock_grant) ?></td>
                <td><?= h($employmentInfos->initial_option_grant) ?></td>
                <td><?= h($employmentInfos->job_credit) ?></td>
                <td><?= h($employmentInfos->notes) ?></td>
                <td><?= h($employmentInfos->is_contingent_worker) ?></td>
                <td><?= h($employmentInfos->end_date) ?></td>
                <td><?= h($employmentInfos->ok_to_rehire) ?></td>
                <td><?= h($employmentInfos->pay_roll_end_date) ?></td>
                <td><?= h($employmentInfos->last_date_worked) ?></td>
                <td><?= h($employmentInfos->regret_termination) ?></td>
                <td><?= h($employmentInfos->eligible_for_sal_continuation) ?></td>
                <td><?= h($employmentInfos->bonus_pay_expiration_date) ?></td>
                <td><?= h($employmentInfos->stock_end_date) ?></td>
                <td><?= h($employmentInfos->salary_end_date) ?></td>
                <td><?= h($employmentInfos->benefits_end_date) ?></td>
                <td><?= h($employmentInfos->customer_id) ?></td>
                <td><?= h($employmentInfos->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EmploymentInfos', 'action' => 'view', $employmentInfos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EmploymentInfos', 'action' => 'edit', $employmentInfos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmploymentInfos', 'action' => 'delete', $employmentInfos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employmentInfos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
