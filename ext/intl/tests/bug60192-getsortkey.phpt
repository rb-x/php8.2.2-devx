--TEST--
Bug #60192 (SegFault when Collator not constructed properly)
--EXTENSIONS--
intl
--FILE--
<?php

class Collator2 extends Collator{
    public function __construct() {
        // omitting parent::__construct($someLocale);
    }
}

$c = new Collator2();
$c->getSortKey('h');
?>
--EXPECTF--
Fatal error: Uncaught Error: Object not initialized in %s:%d
Stack trace:
#0 %s(%d): Collator->getSortKey('h')
#1 {main}
  thrown in %s on line %d
