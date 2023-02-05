--TEST--
DOMDocument::DOMImplementation - basic test for DomDocument::DOMImplementation
--CREDITS--
Lev Radin <prokurator@gmail.com>
# TestFest 2009 NYPHP
--EXTENSIONS--
dom
--FILE--
<?php

$doc = new DOMDocument;
$doc->load(__DIR__."/book.xml");

var_dump($doc->implementation);


?>
--EXPECT--
object(DOMImplementation)#2 (0) {
}
