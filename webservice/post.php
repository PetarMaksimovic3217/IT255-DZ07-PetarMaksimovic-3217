<?php
$type =json; 
/* ukoliko bi se uyimale informacije sa stranice koristilo bi se $_POST['type'];*/
$a =8; 
/* ukoliko bi se uzimale informacije sa stranice koristilo bi se $_POST['a'];*/

if(isset($type) && isset($a)){
function fact($a){
	if($a < 2){
		return 1;
	}else{
		return ($a * fact($a -1));
	}	
}
if($type == "json"){
	header("Content-type: application/json");
	$test_array = array (
	'rezultat' => (fact($a)),
);
	echo json_encode($test_array);
}else {
	header("Content-type: text/xml");
	$test_array = array (
	(fact($a)) => 'rezultat je',
);
$xml = new SimpleXMLElement('<root/>');
array_walk_recursive($test_array, array ($xml, 'addChild'));
print $xml->asXML();
}
}else{
	echo "Unesite parametre: a = integer
	\t\t\t type = json ili xml";
}
?>