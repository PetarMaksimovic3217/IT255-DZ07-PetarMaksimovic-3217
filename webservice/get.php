<?php
$type = $_GET['type'];
$ime = $_GET['ime'];
$prezime = $_GET['prezime'];
$indeks = $_GET['indeks'];
if($type == 'json' && !empty($type)){
	header("Content-type: application/json");
	$test_array = array (
		'ime' => ($ime),
		'prezime' =>($prezime),
		'indeks' =>($indeks),
	);
	echo json_encode($test_array);
} elseif($type == 'xml'){
	header("Content-type: text/xml");
	$test_array = array (
		($ime) => 'ime',
		($prezime) => 'prezime',
		($indeks) => 'indeks',
	);
	$xml = new SimpleXMLElement('<root/>');
	array_walk_recursive($test_array, array ($xml, 'addChild'));
	print $xml->asXML();
} else{
	header("Content-type: application/json");
	$test_array = array (
		'ime' => ('Petar'),
		'prezime' => ('Maksimovic'),
		'brojIndexa' => ('3217'),
	);
}
echo json_encode($test_array);
?>