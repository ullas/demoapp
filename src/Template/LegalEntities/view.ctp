<section class="content-header">
      <h1>
        Legal Entity
        <small>View</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-university"></i> Legal Entity</li>
        <li class="active">View</li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'LegalEntities', 'action' => 'add')); ?>">Add</a></li>
        <li><a href="<?php echo $this->Url->build(array('controller' => 'LegalEntities', 'action' => 'index')); ?>">List</a></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-default"><div class="box-body">
		
    <table class="table table-hover">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($legalEntity->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($legalEntity->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Country Of Registration') ?></th>
            <td><?= h($legalEntity->country_of_registration) ?></td>
        </tr>
        <tr>
            <th><?= __('Official Language') ?></th>
            <td><?= h($legalEntity->official_language) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($legalEntity->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $legalEntity->has('location') ? $this->Html->link($legalEntity->location->name, ['controller' => 'Locations', 'action' => 'view', $legalEntity->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Group') ?></th>
            <td><?= $legalEntity->has('pay_group') ? $this->Html->link($legalEntity->pay_group->name, ['controller' => 'PayGroups', 'action' => 'view', $legalEntity->pay_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($legalEntity->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Standard Weekly Hours') ?></th>
            <td><?= $this->Number->format($legalEntity->standard_weekly_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= $this->Number->format($legalEntity->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($legalEntity->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($legalEntity->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $legalEntity->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
