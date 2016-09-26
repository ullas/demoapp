<section class="content-header">
  <h1>
    Contact Info
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
    <table class="table table-hover">
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($contactInfo->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($contactInfo->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Address1') ?></th>
            <td><?= h($contactInfo->email_address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Address2') ?></th>
            <td><?= h($contactInfo->email_address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Facebook') ?></th>
            <td><?= h($contactInfo->facebook) ?></td>
        </tr>
        <tr>
            <th><?= __('Linkedin') ?></th>
            <td><?= h($contactInfo->linkedin) ?></td>
        </tr>
        <tr>
            <th><?= __('Person Id External') ?></th>
            <td><?= h($contactInfo->person_id_external) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($contactInfo->id) ?></td>
        </tr>
    </table>
</div></div></section>
