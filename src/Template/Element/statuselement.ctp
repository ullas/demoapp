<li>
	
		<?php
		switch ($status) {
			case "0":
				echo '<i class="fa fa-user bg-orange"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i> ';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title.'</a> ';
				echo $subtitle.'</h3><div class="timeline-body"> Description. </div></div>' ;
        	break;
    		case "1":
        		echo '<i class="fa fa-check bg-olive"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i>';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title;
				echo '</a></h3><div class="timeline-body"> approved your request. </div></div>' ;
        	break;
    		case "2":
    			echo '<i class="fa fa-times bg-red"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i>';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title;
				echo '</a></h3><div class="timeline-body"> denied your request. </div></div>' ;
        	break;
        	case "3":
    			echo '<i class="fa fa-step-forward bg-olive"></i><div class="timeline-item">' ;
        		echo '<span class="time"><i class="fa fa-clock-o"></i>';
				echo $time ; 
				echo '</span><h3 class="timeline-header"><a>';
				echo $title;
				echo '</a></h3><div class="timeline-body"> skipped your request. </div></div>' ;
        	break;
			default:
        		echo "";
        	}
		?>       		
   		
</li>
    
