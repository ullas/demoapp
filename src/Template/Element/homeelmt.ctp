<?php
$elmntstring;
$title=preg_replace('/\s+/', '', $title);
switch (strtolower($title)) {
    case "myinfo":
		if($mypic!=""){
        	$picturename='/img/uploadedpics/'.$mypic;
        	echo $this->Html->image($picturename, array('class' => 'img-responsive', 'id'=>'myinfopic', 'alt' => 'User profile picture')); 
		}
        break;
    case "myteam":
	    echo "<ul class='users-list clearfix'>";
		for ($x = 0; $x < count($teammembers); $x++) {
			echo "<li>";
        	echo $this->Html->image('circle-512.png');
			echo "<a href='#' class='users-list-name'>";
			echo $teammembers[$x]['birth_name'];
			echo "</a></li>";
		}
        break;
    case "links":
        echo "<p><i class='fa fa-pencil'></i>";
		echo $this->Html->link(' Edit', array('controller' => '','action'=> ''));
        echo "</p>";
        break;
	case "adminalerts":
        echo "<p><i class='fa fa-check-circle'> There are no alerts.</i></p>";
		echo $this->Html->link(' Edit Admin Alert Settings', array('controller' => '','action'=> ''));
        break;
	case "todo":
        echo "<div class='well well-sm'>Due Anytime</div>";
		// echo $this->Html->link('Finish Profile', array('controller' => 'Profiles','action' => 'index'));
		echo "<hr><div class='well well-sm'>Recently Completed(0)</div>";
        break;
	case "mygoals":
        echo "<p>Currently there are no goal plans available.</p>";
        break;
	case "myadminfavorites":
        echo "<p>You don't have any Admin Favorites shortcut links yet.Click here to add one.</p>";
        break;
    default:
        echo "Lorem....";
}
?> 
