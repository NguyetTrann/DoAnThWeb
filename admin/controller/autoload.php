<?php function my_autoloader($class){
    include_once dirname(__DIR__).'/model/'.$class.'.php';
}
spl_autoload_register('my_autoloader');