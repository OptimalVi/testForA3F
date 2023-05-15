<?php

declare(strict_types=1);

use Core\System\App;

$appDir = $_SERVER['DOCUMENT_ROOT'] . '/../';

spl_autoload_register(
    /**
     * @param string $class
     */
    function (string $class) use ($appDir){
        $classFile = $appDir . str_replace('\\', '/', $class) . '.php';
        require $classFile;
    }
);
echo '<pre>';
$APP = new App($appDir);