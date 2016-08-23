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
            <li>
                <a href="<?php echo $this->Url->build('/LegalEntities'); ?>"><i class="fa fa-circle-o"></i> Legal Entity</a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build('/BusinessUnits'); ?>"><i class="fa fa-circle-o"></i> Business Unit</a>
            </li>
        </ul>
    </li>
        
    <li><a href="<?php echo $this->Url->build('/OrgCharts'); ?>"><i class="fa fa-sitemap"></i><span> Organizational Chart </span></a></li>
    <li><a href="<?php echo $this->Url->build('/Holidays'); ?>"><i class="fa fa-calendar"></i><span> Holidays </span></a></li>
    <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
</ul>
<?php } ?>
