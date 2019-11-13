<?php
require_once '_classes/DatasJson.php';

// for testing 

$datas = new DatasJson();

$datas->loadJsonToObject("json/test.json");

var_dump($datas);

$datas->set("lastname","Paris");
$datas->set("name","David");
$datas->set("e-mail","david.paris@gmail.com");

var_dump($datas);

$datas->delete("e-mail");

var_dump($datas);

$datas->writeObjectToJson("json/test.json");


// end of test
?>