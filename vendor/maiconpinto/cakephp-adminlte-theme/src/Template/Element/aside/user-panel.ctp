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
        <?php $picturename='/img/uploadedpics/'.$this->request->session()->read('sessionuser')['profilepic'];
          					echo $this->Html->image($picturename, array('class' => 'img-circle', 'alt' => 'User profile picture')); ?>
        
    </div>
    <div class="pull-left info">
    	
    	<?php $userrole=$this->request->session()->read('sessionuser')['role'];
    		if ($userrole=="admin" || $userrole=="employee") {
				echo "<p><a href='/Profiles'>".$name."</a></p>";
			}else{
				echo "<p>".$name."</p>";
			}
		?>
							
    	        
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<?php } ?>