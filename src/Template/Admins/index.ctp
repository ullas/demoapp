<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <div class="box box-solid">
           
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo $this->Url->build(array('controller' => 'LegalEntities', 'action' => 'index')); ?>"><i class="fa fa-university"></i> Legal Entity</a></li>
                <li><a href="<?php echo $this->Url->build(array('controller' => 'BusinessUnits', 'action' => 'index')); ?>"><i class="fa fa-briefcase"></i> Business Unit</a></li>
           
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    