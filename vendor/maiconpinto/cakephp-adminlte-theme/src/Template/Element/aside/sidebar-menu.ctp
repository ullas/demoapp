<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">
        MAIN NAVIGATION
    </li>
    <?php $userrole=$this->request->session()->read('sessionuser')['role'];
	switch ($userrole) {
	case "root":
    ?>
    <li><a href="<?php echo $this -> Url -> build('/Homes'); ?>"><i class="fa fa-dashboard"></i><span> Dashboard </span></a></li>
    <li><a href="<?php echo $this -> Url -> build('/Employees'); ?>"><i class="fa fa-user"></i><span> Employee Administration</span></a></li>
    <!-- <li class="treeview">
    <a href="#"> <i class="fa fa-lock"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>  </a>
    <ul class="treeview-menu">

	  <li><a href="<?php echo $this -> Url -> build('/LegalEntities'); ?>"><i class="fa fa-circle-o"></i> Legal Entity</a></li>
    <li><a href="<?php echo $this -> Url -> build('/BusinessUnits'); ?>"><i class="fa fa-circle-o"></i> Business Unit</a></li>
    <li><a href="<?php echo $this -> Url -> build('/Departments'); ?>"><i class="fa fa-circle-o"></i> Department</a></li>
    <li><a href="<?php echo $this -> Url -> build('/Divisions'); ?>"><i class="fa fa-circle-o"></i> Division</a></li>
    <li><a href="<?php echo $this -> Url -> build('/CostCentres'); ?>"><i class="fa fa-circle-o"></i> Cost Center</a></li>
    </ul>
    </li> -->
    <li><a href="<?php echo $this -> Url -> build('/Customers'); ?>"><i class="glyphicon glyphicon-king"></i><span> Customers </span></a></li>
    <?php if ($counts['customer'] > 0): ?>
    <li><a href="<?php echo $this -> Url -> build('/Users'); ?>"><i class="fa fa-user-plus"></i><span> Users </span></a></li>

    <?php
    endif;
	break;
	case "admin":
		if( (isset($counts['legalentity']) && $counts['legalentity'] >0) && (isset($counts['businessunit']) && $counts['businessunit'] >0) &&
			(isset($counts['division']) && $counts['division'] >0) && (isset($counts['department']) && $counts['department'] >0) &&
			(isset($counts['costcenter']) && $counts['costcenter'] >0) && (isset($counts['position']) && $counts['position'] >0) ){
    ?>
    <li><a href="<?php echo $this -> Url -> build('/Homes'); ?>"><i class="fa fa-dashboard"></i><span> Dashboard </span></a></li>
    <li><a href="<?php echo $this -> Url -> build('/Positions/orgchart'); ?>"><i class="fa fa-sitemap"></i><span> Organization Structure </span></a></li>
	<li><a href="<?php echo $this -> Url -> build('/Employees'); ?>"><i class="fa fa-user"></i><span> Employee Administration</span></a></li>
	 <li class="treeview">
    <a href="#"> <i class="fa fa-calendar"></i> <span>Time Management</span> <i class="fa fa-angle-left pull-right"></i>  </a>
    <ul class="treeview-menu">
		<li><a href="<?php echo $this -> Url -> build('/AbsenceQuota'); ?>"><i class="fa fa-circle-o"></i> Absence Quota</a></li>
 		<li><a href="<?php echo $this -> Url -> build('/Attendance'); ?>"><i class="fa fa-clock-o"></i><span> Attendance</span></a></li>
 		<li><a href="<?php echo $this -> Url -> build('/EmployeeAbsencerecords'); ?>"><i class="fa fa-calendar-minus-o"></i><span> Leave Request</span></a></li>
		<li><a href="<?php echo $this -> Url -> build('/EmployeeAbsencerecords/timesheet'); ?>"><i class="fa fa-clock-o"></i><span> Time Sheet</span></a></li>
    </ul>
    </li>
    <li class="treeview">
     <a href="#"> <i class="fa fa-money"></i> <span>Payroll</span> <i class="fa fa-angle-left pull-right"></i>  </a>
     <ul class="treeview-menu">
       <li><a href="<?php echo $this -> Url -> build('/PayrollData'); ?>"><i class="fa fa-circle-o"></i> Payroll Data</a></li>
        <li><a href="<?php echo $this -> Url -> build('/PayrollStatus/processpayroll'); ?>"><i class="fa fa-circle-o"></i> Payroll Process</a></li>
         <li><a href="<?php echo $this -> Url -> build('/PayrollStatus'); ?>"><i class="fa fa-circle-o"></i> Payroll Status</a></li>
         <li><a href="<?php echo $this -> Url -> build('/PayrollResult'); ?>"><i class="fa fa-circle-o"></i> Payroll Result</a></li>
     </ul>
     </li>
     <li><a href="#"><i class="fa fa-line-chart"></i><span> Performance</span></a></li>
     <li><a href="<?php echo $this -> Url -> build('/Compensation'); ?>"><i class="fa fa-trophy"></i><span>Compensation Management</span></a></li>
    <li class="treeview">
    <a href="#"> <i class="fa fa-user-secret"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>  </a>
    <ul class="treeview-menu">

      <li class="treeview">
        <a href="#"> <i class="fa fa-group"></i> <span>Company</span> <i class="fa fa-angle-left pull-right"></i>  </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this -> Url -> build('/LegalEntities'); ?>"><i class="fa fa-circle-o"></i> Legal Entity</a></li>
            <li><a href="<?php echo $this -> Url -> build('/BusinessUnits'); ?>"><i class="fa fa-circle-o"></i> Business Unit</a></li>
            <li><a href="<?php echo $this -> Url -> build('/Divisions'); ?>"><i class="fa fa-circle-o"></i> Division</a></li>
            <li><a href="<?php echo $this -> Url -> build('/Departments'); ?>"><i class="fa fa-circle-o"></i> Department</a></li>
            <li><a href="<?php echo $this -> Url -> build('/CostCentres'); ?>"><i class="fa fa-circle-o"></i> Cost Center</a></li>
            <li><a href="<?php echo $this -> Url -> build('/Regions'); ?>"><i class="fa fa-circle-o"></i> Region</a></li>
            <li><a href="<?php echo $this -> Url -> build('/Locations'); ?>"><i class="fa fa-circle-o"></i> Location</a></li>
          </ul>
       </li>
       <li class="treeview">
         <a href="#"> <i class="fa fa-graduation-cap"></i> <span>Job</span> <i class="fa fa-angle-left pull-right"></i>  </a>
           <ul class="treeview-menu">
             <li><a href="<?php echo $this -> Url -> build('/EmployeeClasses'); ?>"><i class="fa fa-circle-o"></i> Employee Class</a></li>
             <li><a href="<?php echo $this -> Url -> build('/SupervisorLevels'); ?>"><i class="fa fa-circle-o"></i> Supervisor Level</a></li>
             <li><a href="<?php echo $this -> Url -> build('/Joblevels'); ?>"><i class="fa fa-circle-o"></i> Job Level</a></li>
             <li><a href="<?php echo $this -> Url -> build('/JobFunctions'); ?>"><i class="fa fa-circle-o"></i> Job Function</a></li>
             <li><a href="<?php echo $this -> Url -> build('/JobClasses'); ?>"><i class="fa fa-circle-o"></i> Job Class</a></li>
             <li><a href="<?php echo $this-> Url ->build('/Positions'); ?>"><i class="fa fa-circle-o"></i> Position</a></li>
             <li><a href="<?php echo $this -> Url -> build('/WorkSchedules'); ?>"><i class="fa fa-circle-o"></i> Work Schedule</a></li>
             <li><a href="<?php echo $this -> Url -> build('/HolidayCalendars'); ?>"><i class="fa fa-circle-o"></i> Holiday Calendar</a></li>
           </ul>
        </li>
    <li class="treeview">
      <a href="#"> <i class="fa fa-calendar"></i> <span>Time Type</span> <i class="fa fa-angle-left pull-right"></i>  </a>
        <ul class="treeview-menu">
        	<li><a href="<?php echo $this -> Url -> build('/TimeAccountTypes'); ?>"><i class="fa fa-circle-o"></i> Time Account Type</a></li>
            <li><a href="<?php echo $this -> Url -> build('/TimeTypes'); ?>"><i class="fa fa-circle-o"></i> Time Type</a></li>
 		    <li><a href="<?php echo $this -> Url -> build('/TimeTypeProfiles'); ?>"><i class="fa fa-circle-o"></i> Time Type Profiles</a></li>
        </ul>
     </li>
     <li class="treeview">
       <a href="#"> <i class="fa fa-dollar"></i> <span>Payroll Master</span> <i class="fa fa-angle-left pull-right"></i>  </a>
       <ul class="treeview-menu">
         <!-- <li><a href="<?php echo $this -> Url -> build('/PayrollArea'); ?>"><i class="fa fa-circle-o"></i> Payroll Area</a></li> -->
         <li><a href="<?php echo $this -> Url -> build('/Frequencies'); ?>"><i class="fa fa-circle-o"></i> Frequency</a></li>
         <li><a href="<?php echo $this -> Url -> build('/PayGroups'); ?>"><i class="fa fa-circle-o"></i> Pay Group</a></li>
         <li><a href="<?php echo $this -> Url -> build('/PayGrades'); ?>"><i class="fa fa-circle-o"></i> Pay Grade</a></li>
         <li><a href="<?php echo $this -> Url -> build('/PayRanges'); ?>"><i class="fa fa-circle-o"></i> Pay Range</a></li>
         <li><a href="<?php echo $this -> Url -> build('/PayComponentGroups'); ?>"><i class="fa fa-circle-o"></i> Pay Component Group</a></li>
         <li><a href="<?php echo $this -> Url -> build('/PayComponents'); ?>"><i class="fa fa-circle-o"></i> Pay Component</a></li>
       </ul>
      </li>
    <li><a href="<?php echo $this -> Url -> build('/Workflowrules'); ?>"><i class="fa fa-list-ol"></i> Workflow</a></li>
    </ul>
    </li>
    <?php
    }else{
    ?>
	<li><a href="<?php echo $this -> Url -> build('/LegalEntities/addwizard'); ?>"><i class="fa fa-circle-o"></i>Form Wizard</a></li>
    <?php
    }
	break;
	case "employee":
    ?>
    <li><a href="<?php echo $this -> Url -> build('/Homes'); ?>"><i class="fa fa-dashboard"></i><span> Dashboard </span></a></li>
    <li><a href="<?php echo $this -> Url -> build('/Positions/orgchart'); ?>"><i class="fa fa-sitemap"></i><span> Organization Structure </span></a></li>
	  <li><a href="<?php echo $this -> Url -> build('/Employees/view/'.$this->request->session()->read('sessionuser')['employee_id']); ?>"><i class="glyphicon glyphicon-user"></i><span> Profile </span></a></li>
	  <li><a href="<?php echo $this -> Url -> build('/Dependents'); ?>"><i class="fa fa-child"></i><span> Dependents </span></a></li>
    <li class="treeview">
     <a href="#"> <i class="fa fa-calendar"></i> <span>Time Management</span> <i class="fa fa-angle-left pull-right"></i>  </a>
     <ul class="treeview-menu">
     	<li><a href="<?php echo $this -> Url -> build('/Attendance'); ?>"><i class="fa fa-clock-o"></i><span> Attendance</span></a></li>
 		<li><a href="<?php echo $this -> Url -> build('/EmployeeAbsencerecords'); ?>"><i class="fa fa-calendar-minus-o"></i><span> Leave Requests</span></a></li>
 		<li><a href="<?php echo $this -> Url -> build('/EmployeeAbsencerecords/timesheet'); ?>"><i class="fa fa-clock-o"></i><span> Time Sheet</span></a></li>
     </ul>
     </li>
    <li><a href="<?php echo $this -> Url -> build('/Notes'); ?>"><i class="fa fa-file-text-o"></i><span> Notes </span></a></li>
    <?php
	break;
	default:
    ?>
    <?php } ?>
    <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
</ul>
<?php } ?>
