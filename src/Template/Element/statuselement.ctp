<li>
	
		<?php
		switch ($subtitle) {
			case "Request Raised":
				echo '<i class="fa fa-user bg-orange"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i> ';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title.'</a> ';
				echo $subtitle.'</h3><div class="timeline-body">'.$description. ' </div></div>' ;
        	break;
    		case "Request Approved":
        		echo '<i class="fa fa-check bg-green"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i> ';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title.'</a> ';
				echo $subtitle.'</h3><div class="timeline-body">'.$description. ' </div></div>' ;
        	break;
    		case "Request Rejected":
    			echo '<i class="fa fa-times bg-red"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i> ';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title.'</a> ';
				echo $subtitle.'</h3><div class="timeline-body">'.$description. ' </div></div>' ;
        	break;
        	case "Request Modified":
    			echo '<i class="fa fa-pencil bg-aqua"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i> ';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title.'</a> ';
				echo $subtitle.'</h3><div class="timeline-body">'.$description. ' </div></div>' ;
        	break;
			default:
        		echo "";
        	}
		?>       		
   		
</li>
    
