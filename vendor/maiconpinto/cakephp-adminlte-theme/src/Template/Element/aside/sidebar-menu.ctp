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
    <li><a href="<?php echo $this -> Url -> build('/Customers'); ?>"><i class="glyphicon glyphicon-king"></i><span> Customer </span></a></li>
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
	<li><a href="<?php echo $this -> Url -> build('/Employees'); ?>"><i class="fa fa-user"></i><span> Employee</span></a></li>
	<li><a href="<?php echo $this -> Url -> build('/JobInfos'); ?>"><i class="fa fa-briefcase "></i><span> Job</span></a></li>
	
	 <li class="treeview">
    <a href="#"> <i class="fa fa-calendar-times-o"></i> <span>Leave</span> <i class="fa fa-angle-left pull-right"></i>  </a>
    <ul class="treeview-menu">
    	<li><a href="<?php echo $this -> Url -> build('/TimeTypes'); ?>"><i class="fa fa-circle-o"></i> Leave Type</a></li>
		<li><a href="<?php echo $this -> Url -> build('/TimeAccountTypes'); ?>"><i class="fa fa-circle-o"></i> Time Account Type</a></li>
	
    </ul>
    </li>
    
    <li class="treeview">
    	<a href="#"> <i class="fa fa-puzzle-piece"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>  </a>
    	<ul class="treeview-menu">
    		<li><a href="<?php echo $this -> Url -> build('/JobFunctions'); ?>"><i class="fa fa-circle-o"></i> Job Function</a></li>
    		<li><a href="<?php echo $this -> Url -> build('/JobClasses'); ?>"><i class="fa fa-circle-o"></i> Job Class</a></li>
			<li><a href="<?php echo $this -> Url -> build('/Regions'); ?>"><i class="fa fa-circle-o"></i> Region</a></li>
    		<li><a href="<?php echo $this -> Url -> build('/Locations'); ?>"><i class="fa fa-circle-o"></i> Location</a></li>
    		
    		
    		<li><a href="<?php echo $this -> Url -> build('/HolidayCalendars'); ?>"><i class="fa fa-circle-o"></i> Holiday Calendars</a></li>
    		
    		<li><a href="<?php echo $this -> Url -> build('/WorkSchedules'); ?>"><i class="fa fa-circle-o"></i> WorkSchedules</a></li>
    		
    		<li class="treeview">
    			<a href="#"><i class="fa fa-circle-o"></i> Payroll<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            	<ul class="treeview-menu">
                	<li><a href="<?php echo $this -> Url -> build('/PayrollArea'); ?>"><i class="fa fa-circle-o"></i> Payroll Area</a></li>
    				<li><a href="<?php echo $this -> Url -> build('/Frequencies'); ?>"><i class="fa fa-circle-o"></i> Frequency</a></li>
    				<li><a href="<?php echo $this -> Url -> build('/PayGroups'); ?>"><i class="fa fa-circle-o"></i> Pay Group</a></li>
    				<li><a href="<?php echo $this -> Url -> build('/PayGrades'); ?>"><i class="fa fa-circle-o"></i> Pay Grade</a></li>
    				<li><a href="<?php echo $this -> Url -> build('/PayRanges'); ?>"><i class="fa fa-circle-o"></i> Pay Range</a></li>
    				<li><a href="<?php echo $this -> Url -> build('/PayComponents'); ?>"><i class="fa fa-circle-o"></i> Pay Component</a></li>
    				<li><a href="<?php echo $this -> Url -> build('/PayComponentGroups'); ?>"><i class="fa fa-circle-o"></i> Pay Component Group</a></li>
    				
              	</ul>
            </li>
    
    
    	</ul>
    </li>
    <li class="treeview">
    <a href="#"> <i class="fa fa-lock"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>  </a>
    <ul class="treeview-menu">
    	
	<li><a href="<?php echo $this -> Url -> build('/LegalEntities'); ?>"><i class="fa fa-circle-o"></i> Legal Entity</a></li>
    <li><a href="<?php echo $this -> Url -> build('/BusinessUnits'); ?>"><i class="fa fa-circle-o"></i> Business Unit</a></li>
    <li><a href="<?php echo $this -> Url -> build('/Departments'); ?>"><i class="fa fa-circle-o"></i> Departments</a></li>
    <li><a href="<?php echo $this -> Url -> build('/Divisions'); ?>"><i class="fa fa-circle-o"></i> Divisions</a></li>
    <li><a href="<?php echo $this -> Url -> build('/CostCentres'); ?>"><i class="fa fa-circle-o"></i> Cost Centres</a></li>
    <li><a href="<?php echo $this->Url->build('/Positions'); ?>"><i class="fa fa-circle-o"></i> Position</a></li>
    <li><a href="<?php echo $this -> Url -> build('/CalendarAssignments'); ?>"><i class="fa fa-circle-o"></i> Calendar Assignments</a></li>
    
    <li><a href="<?php echo $this -> Url -> build('/Workflowrules'); ?>"><i class="fa fa-circle-o"></i> Workflow</a></li>
    <li class="treeview">
 		<a href="#"><i class="fa fa-circle-o"></i> Payroll<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
			<ul class="treeview-menu">
				<li><a href="<?php echo $this -> Url -> build('/PayrollData'); ?>"><i class="fa fa-circle-o"></i> Payroll Data</a></li>
    			<li><a href="<?php echo $this -> Url -> build('/PayrollStatus'); ?>"><i class="fa fa-circle-o"></i> Payroll Status</a></li>
    			<li><a href="<?php echo $this -> Url -> build('/PayrollRecord'); ?>"><i class="fa fa-circle-o"></i> Payroll Record</a></li>
    			<li><a href="<?php echo $this -> Url -> build('/PayrollResult'); ?>"><i class="fa fa-circle-o"></i> Payroll Result</a></li>
			</ul>
     	</li>
    </ul>
    </li>
	
    <li><a href="<?php echo $this -> Url -> build('/Positions/orgchart'); ?>"><i class="fa fa-sitemap"></i><span> Organizational Chart </span></a></li>

    <?php
		}
	break;
	case "manager":
    ?>
    <li><a href="<?php echo $this -> Url -> build('/Homes'); ?>"><i class="fa fa-dashboard"></i><span> Dashboard </span></a></li>

    <li class="treeview">
    <a href="#"> <i class="fa fa-home"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>  </a>
    <ul class="treeview-menu">

    <li><a href="<?php echo $this -> Url -> build('/LegalEntities'); ?>"><i class="fa fa-circle-o"></i> Legal Entity</a></li>
    <li><a href="<?php echo $this -> Url -> build('/BusinessUnits'); ?>"><i class="fa fa-circle-o"></i> Business Unit</a></li>
    <li><a href="<?php echo $this -> Url -> build('/Departments'); ?>"><i class="fa fa-circle-o"></i> Departments</a></li>
    <li><a href="<?php echo $this -> Url -> build('/CostCentres'); ?>"><i class="fa fa-circle-o"></i> Cost Centres</a></li>
    <li><a href="<?php echo $this -> Url -> build('/Positions'); ?>"><i class="fa fa-circle-o"></i> Position</a></li>
    <li><a href="<?php echo $this -> Url -> build('/EmpDataBiographies'); ?>"><i class="fa fa-circle-o"></i> Emp Data Biography</a></li>
    
    
    <li><a href="<?php echo $this -> Url -> build('/Divisions'); ?>"><i class="fa fa-circle-o"></i> Divisions</a></li>
    

    <li><a href="<?php echo $this -> Url -> build('/Addresses'); ?>"><i class="fa fa-circle-o"></i> Addresses</a></li>
    <li><a href="<?php echo $this -> Url -> build('/CalendarAssignments'); ?>"><i class="fa fa-circle-o"></i> Calendar Assignments</a></li>
    <li><a href="<?php echo $this -> Url -> build('/ContactInfos'); ?>"><i class="fa fa-circle-o"></i> Contact Infos</a></li>
    <li><a href="<?php echo $this -> Url -> build('/CorporateAddresses'); ?>"><i class="fa fa-circle-o"></i> Corporate Addresses</a></li>
    <li><a href="<?php echo $this -> Url -> build('/Dependents'); ?>"><i class="fa fa-circle-o"></i> Dependents</a></li>
    </ul>
    </li>
    <li><a href="<?php echo $this -> Url -> build('/Profiles'); ?>"><i class="glyphicon glyphicon-user"></i><span> Profile </span></a></li>
    <li><a href="<?php echo $this -> Url -> build('/OrgCharts'); ?>"><i class="fa fa-sitemap"></i><span> Organizational Chart </span></a></li>
    <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>

    <?php
	break;
	case "employee":
    ?>
    <li><a href="<?php echo $this -> Url -> build('/Homes'); ?>"><i class="fa fa-dashboard"></i><span> Dashboard </span></a></li>
	<li><a href="<?php echo $this -> Url -> build('/Profiles'); ?>"><i class="glyphicon glyphicon-user"></i><span> Profile </span></a></li>
	<li><a href="<?php echo $this -> Url -> build('/Dependents'); ?>"><i class="fa fa-users"></i><span> Dependents </span></a></li>
    <li><a href="<?php echo $this -> Url -> build('/Notes'); ?>"><i class="fa fa-file-text-o"></i><span> Notes </span></a></li>
    <li><a href="<?php echo $this -> Url -> build('/Positions/orgchart'); ?>"><i class="fa fa-sitemap"></i><span> Organizational Chart </span></a></li>
    <li><a href="<?php echo $this -> Url -> build('/EmployeeAbsencerecords'); ?>"><i class="fa fa-calendar "></i> Leaves</a></li>

   
    <?php
	break;
	default:
    ?>

    <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>

    <?php } ?>
</ul>
<?php } ?>
