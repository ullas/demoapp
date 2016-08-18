<div class="panel panel-primary">
    <div class="panel-heading"><?php echo $title; ?></div>
    <div class="panel-body">

<?php
$elmntstring;
$title=preg_replace('/\s+/', '', $title);
switch (strtolower($title)) {
    case "myinfo":
        echo "";
        break;
    case "myteam":
		for ($x = 0; $x < 3; $x++) {
        	echo $this->Html->image('profile-icon.png');
		}
        break;
    case "links":
        echo "";
        break;
	case "adminalerts":
        $elmntstring="<p>There are no alerts.</p>";
		echo $elmntstring;
        break;
    default:
        echo "Lorem....";
}
?>
    </div>
    <!-- <div class="panel-footer">Panel Footer</div> -->
</div>