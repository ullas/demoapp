<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside-control-sidebar.ctp';
if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Tab panes -->
    <div class="tab-content">
        

        <!-- Settings tab content -->
        <div class="active tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">Account Settings</h3>

                <div class="form-group">
					<p>Allow the user to change his preferences.</p>
					 <a href="/Users/edit/<?php echo $this->request->session()->read('sessionuser')['id']; ?>">Manage your account</a>
                </div>
                
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<?php
}
?>
