<style>
	.toggle{width:100%;}
	.mt25{margin-top:24px;}
</style>

<section class="content-header">
      <h1>
        Compensation Management
        <small>Wage Analysis Dashboard</small>
      </h1>
    </section>

<section class="content">

	<div class="row">
				 <!-- fix for small devices only -->
				 <div class="clearfix visible-sm-block"></div>

				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">Total Employees</span>
							 <span class="info-box-number"><?php echo $totalempcount; ?></span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">Payroll Head Count</span>
							 <span class="info-box-number"><?php echo $payrollheadcount; ?></span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">FNF Settlement</span>
							 <span class="info-box-number">0</span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">New Joinees</span>
							 <span class="info-box-number">0</span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
			 </div>
			 <!-- /.row -->

<div class="row">

	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-body">
				<h4 class="">
			Wage Analysis
		</h4>
				<div class="row">
					<div class="col-md-4"><div class="form-group text"><label class="control-label">Type</label>
             			<div class="input-group">
             				<select class="form-control select2" id="type">
  								<option></option>
  								<option value="single">Single Employee</option>
  								<option value="paygroup">Pay Group</option>
  								<option value="organisation">Entire Organisation</option>
							</select>
             			</div></div></div>

             			<div class="col-md-4"><div class="form-group text"><label class="control-label">Employee</label>
             			<div class="input-group"><input type="text" name="period" id="period" class="periodpicker form-control"></div></div></div>

				</div>

				<div class="row">

					<div class="col-md-4"><div class="form-group text"><label class="control-label">Pay Component Type</label>
             			<div class="input-group">
             				<select class="form-control select2" id="type">
  								<option></option>
  								<option value="paycomponent">Pay Component</option>
  								<option value="paycomponentgroup">Pay Component Group</option>
							</select>
             			</div></div></div>

             			<div class="col-md-4"><div class="form-group text"><label class="control-label">Pay Component</label>
             			<div class="input-group"><input type="text" name="period" id="period" class="periodpicker form-control"></div></div></div>

				</div>

				<div class="row">

					<div class="col-md-4"><div class="form-group text"><label class="control-label">Amount/Percentage</label>
             			<div class="input-group">
             				<select class="form-control select2" id="type">
  								<option></option>
  								<option value="paycomponent">Amount</option>
  								<option value="paycomponentgroup">Percentage</option>
							</select>
             			</div></div></div>

             			<div class="col-md-4"><div class="form-group text"><label class="control-label">Value</label>
             			<div class="input-group"><input type="text" name="period" id="period" class="periodpicker form-control"></div></div></div>

             			<div class="col-md-4"><div class="input-group mt25">
						<input data-width="100%;" type="checkbox" data-toggle="toggle" id="payrolllock"  data-offstyle="success" data-onstyle="danger" data-off="<i class='fa fa-plus p3'></i> Increment"
						data-on="<i class='fa fa-minus p3'></i> Deduction"></div></div>

				</div>

      		</div>
      		<div class="box-footer clearfix">
              <input type="button" value="Calculate" class="pull-right preprocessall btn btn-primary"/>
            </div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
              	<i class="fa fa-money"></i>
			    <h3 class="box-title">Last Payroll Overview</h3>
            </div>
			<div class="box-body">

				<div class="info-box bg-yellow">
            		<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Total Wage</span>
              			<span class="info-box-number">AED 5,200</span>
            		</div>
          		</div>

          		<div class="info-box bg-green">
            		<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Salary Payout</span>
              			<span class="info-box-number">AED 5,200</span>
            		</div>
          		</div>

      		</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
              	<i class="fa fa-money"></i>
			    <h3 class="box-title">Projected Salary</h3>
            </div>
			<div class="box-body">
				<table class="table table-bordered">
                <tbody><tr>
                  <th>Total Wage</th>
                  <th>Salary Payout</th>
                  <th>Total Tax</th>
                </tr>
                <tr>
                  <td>AED xxxx</td>
                  <td>AED xxxx</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="description-percentage text-green"><i class="fa fa-caret-up"></i> 18%</td>
                  <td class="description-percentage text-green"><i class="fa fa-caret-up"></i> 18%</td>
                  <td></td>
                </tr>
              </tbody>
              </table>
      		</div>
		</div>
	</div>

</div>

</section>
