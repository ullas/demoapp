<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'user-panel.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<div class="user-panel">
    <div class="pull-left image">
        <?php if($this->request->session()->read('sessionuser')['profilepic']!=''){$picturename=$this->request->session()->read('sessionuser')['profilepic'];}
                            				else{$picturename='/img/uploadedpics/defaultuser.png';} 
											
											if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
												echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'img-circle', 'alt' => 'User profile picture'));
											}else{
												echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'img-circle', 'alt' => 'User profile picture'));
											} ?>
        
    </div>
    <div class="pull-left info">
    	
    	<?php $userrole=$this->request->session()->read('sessionuser')['role'];
    		if ($userrole=="admin" || $userrole=="employee") {
    			if( (isset($counts['legalentity']) && $counts['legalentity'] >0) && (isset($counts['businessunit']) && $counts['businessunit'] >0) &&
					(isset($counts['division']) && $counts['division'] >0) && (isset($counts['department']) && $counts['department'] >0) &&
					(isset($counts['costcenter']) && $counts['costcenter'] >0) && (isset($counts['position']) && $counts['position'] >0) ){
						echo "<p><a href='/Employees/view/".$this->request->session()->read('sessionuser')["employee_id"]."'>".$empname."</a></p>";
				}else{
					echo "<p>".$empname."</p>";
				}
			}else{
				echo "<p>".$empname."</p>";
			}
		?>
							
    	        
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<?php } ?>