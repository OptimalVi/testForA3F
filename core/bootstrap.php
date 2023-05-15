<?php

spl_autoload_register(
    /**
     * @param string $class
     */
    function (string $class) {
        $AppDir = $_SERVER['DOCUMENT_ROOT'];
        $classFile = $AppDir . str_replace('\\', '/', $class) . '.php';
        require $classFile;
    }
);
