<div class="panel panel-primary">
<?= 
// $dbarray = array( array('A',''),
                  // array('B','A'),
                  // array('C','A'));
$str;

// function arrayToList($obj) {
    // $par = $obj.parent;
//              
  // $str.= "<ul>";
  // foreach($obj as $v) {
    // if( is_array($v)) arrayToList($v);
    // $str.= '<li>' . $v . '</li>';
  // }
  // $str.= "</ul>";
// }
// arrayToList(dbarray);
// echo ($str); 
// echo ($dbarray[1][1]) ;

$dbarray = array(0 => array('name'=>"A",'parent'=>""),
             1 => array('name'=>"B",'parent'=>"A"),
             2 => array('name'=>"C",'parent'=>"A"),
			 3 => array('name'=>"D",'parent'=>"B"),
			 4 => array('name'=>"E",'parent'=>"B"));


$elmtname;
function arrayToList($obj) {
	$str.= '<ul>';
	foreach($obj as $data) {		//echo($data['name']);
		
		$str.= '<li>' . $data['name'] . '</li>';
			
		if(!(empty($data['parent']))){
			arrayToList($data);
		}
		
		
		
		
		$elmtname = $data['name'];
	}
	$str.= '</ul>';//echo($str);
	return $str;
}


echo(arrayToList($dbarray));




if(empty($str)){
	echo($elmtname."empty");
}else{
	echo("o/p:".$str);
}



// $list = '<ul><li>Bungle</li></ul>';
// 
// $dom = new DOMDocument();
// $dom->loadHTML($list);
// $dom->getElementsByTagName('ul')->item(0)->insertBefore(
  // $dom->createElement('li', 'Zippy'),
  // $dom->getElementsByTagName('li')->item(1)
// );
// echo $dom->saveHTML();


?>
</div>

