<?php

spl_autoload_register(function($class) {
    var_dump($class);
    new Abc;
});
opcache_compile_file(__DIR__ . '/preload_const_autoload_2.inc');
