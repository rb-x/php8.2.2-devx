--TEST--
Bug #49649 (unserialize() doesn't handle changes in property visibility) - to private
--FILE--
<?php

/**
 *class Foo
 *{
 *	private $private = 1;
 *
 *	protected $protected = 2;
 *
 *	public $public = 3;
 *
 *	public $notThere = 'old';
 * }
 *
 * echo base64_encode(serialize(new Foo()));
 *
 * The class above represents the serialized, base64_encoded string below.
*/
$serialized = 'TzozOiJGb28iOjQ6e3M6MTI6IgBGb28AcHJpdmF0ZSI7aToxO3M6MTI6IgAqAHByb3RlY3RlZCI7aToyO3M6NjoicHVibGljIjtpOjM7czo4OiJub3RUaGVyZSI7czozOiJvbGQiO30';

class Foo
{
    private $public = null;

    private $protected = null;

    private $private = null;
}

$class = unserialize(base64_decode($serialized));
var_dump($class);
?>
--EXPECTF--
Deprecated: Creation of dynamic property Foo::$notThere is deprecated in %s on line %d
object(Foo)#1 (4) {
  ["public":"Foo":private]=>
  int(3)
  ["protected":"Foo":private]=>
  int(2)
  ["private":"Foo":private]=>
  int(1)
  ["notThere"]=>
  string(3) "old"
}
