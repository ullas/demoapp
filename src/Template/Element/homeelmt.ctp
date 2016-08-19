<?php
$elmntstring;
$title=preg_replace('/\s+/', '', $title);
switch (strtolower($title)) {
    case "myinfo":
        echo $this->Html->image('photo4.jpg', ['alt' => 'Photo', 'class' => 'img-responsive pad']);
        break;
    case "myteam":
    echo "<ul class='users-list clearfix'>";
		for ($x = 0; $x < 7; $x++) {
			echo "<li>";
        	echo $this->Html->image('profile-icon.png');
			echo "<a href='#' class='users-list-name'>User</a>";
			echo "</li>";
		}
        break;
    case "links":
        echo "";
        break;
	case "adminalerts":
        $elmntstring="<p>There are no alerts.</p>";
		echo $elmntstring;
        break;
	case "todo":
        echo "";
        break;
	case "alerts":
        echo "";
        break;
	case "myadminfavorites":
        echo "";
        break;
    default:
        echo "Lorem....";
}
?> 
