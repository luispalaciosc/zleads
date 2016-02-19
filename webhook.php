<?php 
$challenge = $_REQUEST['hub_challenge'];
$verify_token = $_REQUEST['hub_verify_token'];

if($verify_token === 'abc123'){ echo $challenge; }

$input = json_decode(file_get_contents('php://input'),true);

$file = fopen("archivo.txt", "a");
$entero = rand(5, 1000);
$texto = "Esto es una nueva linea de texto" . $entero . "nueva";
fwrite($file, $texto . PHP_EOL);
fwrite($file, "Otra más" . PHP_EOL);
fclose($file);

//var_dump($input);
error_log(print_r($input, true));
?>