--TEST--
Conflicting constants in another traits in same composing classes with different visibility modifiers should result in a fatal error, since this indicates that the code is incompatible.
--FILE--
<?php

trait Trait1 {
  public const Constant = 42;
}

trait Trait2 {
  private const Constant = 42;
}

echo "PRE-CLASS-GUARD\n";

class TraitsTest {
    use Trait1;
    use Trait2;
}

echo "POST-CLASS-GUARD\n";
?>
--EXPECTF--
PRE-CLASS-GUARD

Fatal error: Trait1 and Trait2 define the same constant (Constant) in the composition of TraitsTest. However, the definition differs and is considered incompatible. Class was composed in %s on line %d
