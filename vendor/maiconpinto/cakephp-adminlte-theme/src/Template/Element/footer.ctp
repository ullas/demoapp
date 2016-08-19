<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'footer.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2016 <a href="http://www.maptell.com">Maptell Geosystems Pvt Ltd</a>.</strong> All rights
    reserved.
</footer>
<?php } ?>
