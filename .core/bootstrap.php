<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 05.08.21
 * Time: 6:50
 */

use \iocms\bus\EventBus;
use \iocms\bus\CoreEvents;

// classes
spl_autoload_register(function ($class_name) {
    chdir(ROOTDIR);
    include str_replace('\\', DIRECTORY_SEPARATOR, '.\\.core\\'.$class_name.'.php');
});


////if ($filePath && is_file($filePath)) {
////    // 1. check that file is not outside (behind) of this directory for security
////    // 2. check for circular reference to server.php
////    // 3. don't serve dotfiles
////    if (strpos($filePath, __DIR__ . DIRECTORY_SEPARATOR) === 0
////        && $filePath != __DIR__ . DIRECTORY_SEPARATOR . 'server.php'
////        && substr(basename($filePath), 0, 1) != '.'
////    ) {
////        if (strtolower(substr($filePath, -4)) == '.php') {
////            // change directory for php includes
////            chdir(dirname($filePath));
////
////            // php file; serve through interpreter
////            include $filePath;
////        } else {
////            // asset file; serve from filesystem
////            return false;
////        }
////    } else {
////        // disallowed file
////        header("HTTP/1.1 404 Not Found");
////        echo "404 Not Found";
////    }
////} else {
////    // rewrite to our router file
////    // this portion should be customized to your needs
////    $_REQUEST['valor'] = ltrim($_SERVER['REQUEST_URI'], '/');
////    include __DIR__ . DIRECTORY_SEPARATOR . 'url.php';
////}
//echo "<pre>";
//print_r($filePath);
//die();

// events
EventBus::dispatch(CoreEvents::getInstance()->core_bootstrap_loaded);

