<?php

$xml = simplexml_load_file('resources/xml/porady.xml') or die("Error: Cannot create object");
$name = '2003';
$products = $xml->xpath("//bookstore/book/year[contains(text(), '$name')]/parent::*");
$ile=count($products);
echo $ile;
echo '</br>';

//print_r($products[0]);


foreach ($products as &$value) {
    echo $value->author;
    echo '</br>';
}

?>