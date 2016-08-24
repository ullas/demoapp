<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
   <li><a href="<?php echo $this->Url->build('/Homes'); ?>"><i class="fa fa-dashboard"></i><span> Dashboard </span></a></li>
    
    
	<li class="treeview">
        <a href="#"> <i class="fa fa-home"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>  </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/LegalEntities'); ?>"><i class="fa fa-circle-o"></i> Legal Entity</a></li>
            <li><a href="<?php echo $this->Url->build('/BusinessUnits'); ?>"><i class="fa fa-circle-o"></i> Business Unit</a></li>
            <li><a href="<?php echo $this->Url->build('/Departments'); ?>"><i class="fa fa-circle-o"></i> Departments</a></li>
            <li><a href="<?php echo $this->Url->build('/Divisions'); ?>"><i class="fa fa-circle-o"></i> Divisions</a></li>
            <li><a href="<?php echo $this->Url->build('/CostCentres'); ?>"><i class="fa fa-circle-o"></i> Cost Centres</a></li>
            
            <li><a href="<?php echo $this->Url->build('/Addresses'); ?>"><i class="fa fa-circle-o"></i> Addresses</a></li>
            <!--  <li><a href="<?php echo $this->Url->build('/CalendarAssignments'); ?>"><i class="fa fa-circle-o"></i> Calendar Assignments</a></li> -->
            <li><a href="<?php echo $this->Url->build('/ContactInfos'); ?>"><i class="fa fa-circle-o"></i> Contact Infos</a></li>
            <li><a href="<?php echo $this->Url->build('/CorporateAddresses'); ?>"><i class="fa fa-circle-o"></i> Corporate Addresses</a></li>
            <li><a href="<?php echo $this->Url->build('/Dependents'); ?>"><i class="fa fa-circle-o"></i> Dependents</a></li>
            
            <li><a href="<?php echo $this->Url->build('/EmpDataBiographies'); ?>"><i class="fa fa-circle-o"></i> Emp Data Biography</a></li>
            <!-- <li><a href="<?php echo $this->Url->build('/EmpDataPersonals'); ?>"><i class="fa fa-circle-o"></i> Emp Data Personal</a></li> -->
            <li><a href="<?php echo $this->Url->build('/EmploymentInfos'); ?>"><i class="fa fa-circle-o"></i> Employment Info</a></li>
            <li><a href="<?php echo $this->Url->build('/EventReasons'); ?>"><i class="fa fa-circle-o"></i> Event reason</a></li>
            
            <li><a href="<?php echo $this->Url->build('/Frequencies'); ?>"><i class="fa fa-circle-o"></i> Frequency</a></li>
            <li><a href="<?php echo $this->Url->build('/HolidayCalendars'); ?>"><i class="fa fa-circle-o"></i> Holiday Calendar</a></li>
            <li><a href="<?php echo $this->Url->build('/Holidays'); ?>"><i class="fa fa-circle-o"></i> Holiday</a></li>
            
            <li><a href="<?php echo $this->Url->build('/JobClasses'); ?>"><i class="fa fa-circle-o"></i> Job Class</a></li>
            <li><a href="<?php echo $this->Url->build('/JobFunctions'); ?>"><i class="fa fa-circle-o"></i> Job Function</a></li>
            <li><a href="<?php echo $this->Url->build('/JobInfos'); ?>"><i class="fa fa-circle-o"></i> Job Info</a></li>
            <li><a href="<?php echo $this->Url->build('/Locations'); ?>"><i class="fa fa-circle-o"></i> Location</a></li>
            
            <li><a href="<?php echo $this->Url->build('/PayComponentGroups'); ?>"><i class="fa fa-circle-o"></i> Pay Component Group</a></li>
            <li><a href="<?php echo $this->Url->build('/PayComponents'); ?>"><i class="fa fa-circle-o"></i> Pay Component</a></li>
            <li><a href="<?php echo $this->Url->build('/PayGrades'); ?>"><i class="fa fa-circle-o"></i> Pay Grade</a></li>
            <li><a href="<?php echo $this->Url->build('/PayGroups'); ?>"><i class="fa fa-circle-o"></i> Pay Group</a></li>
            <li><a href="<?php echo $this->Url->build('/PayRanges'); ?>"><i class="fa fa-circle-o"></i> Pay Range</a></li>
            <li><a href="<?php echo $this->Url->build('/Picklists'); ?>"><i class="fa fa-circle-o"></i> Picklist</a></li>
            <li><a href="<?php echo $this->Url->build('/Positions'); ?>"><i class="fa fa-circle-o"></i> Position</a></li>
            <li><a href="<?php echo $this->Url->build('/Regions'); ?>"><i class="fa fa-circle-o"></i> Region</a></li>
            
        </ul>
    </li>
        
    <li><a href="<?php echo $this->Url->build('/OrgCharts'); ?>"><i class="fa fa-sitemap"></i><span> Organizational Chart </span></a></li>
    <li><a href="<?php echo $this->Url->build('/Holidays'); ?>"><i class="fa fa-calendar"></i><span> Holidays </span></a></li>
    <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
</ul>
<?php } ?>
