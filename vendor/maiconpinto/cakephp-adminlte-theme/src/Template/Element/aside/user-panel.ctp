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
        <?php echo $this->Html->image('sree.png', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
    </div>
    <div class="pull-left info">
        <p>Sreekanth M</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<?php } ?>