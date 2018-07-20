<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */

require_once('debug.inc.php');
define('DEBUG', 1);

chdir(dirname(__DIR__));


//function fatal_handler()
//{
//    $errfile = "unknown file";
//    $errstr  = "shutdown";
//    $errno   = E_CORE_ERROR;
//    $errline = 0;
//
//    $error = error_get_last();
//
//    if( $error !== NULL) {
//        $errno   = $error["type"];
//        $errfile = $error["file"];
//        $errline = $error["line"];
//        $errstr  = $error["message"];
//
//        prn( $errno, $errstr, $errfile, $errline);
//    }
//}

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
