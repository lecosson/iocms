<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 05.08.21
 * Time: 5:55
 */

//use iocms\utils\Heart;
use iocms\Core;
use iocms\router\Router;
use iocms\renderer\Renderer;

const ROOTDIR = __DIR__;
const COREDIR = ROOTDIR . DIRECTORY_SEPARATOR . ".core";

//TODO: move to upper level to avoid web user access
//FIXME: move behavior to plugin to avoid using static files
const DBDIR = __DIR__;


require_once ROOTDIR . '/vendor/autoload.php';
require_once COREDIR . '/bootstrap.php';

echo Core::getInstance()->getResponse()->renderPage();

echo '<pre>';
echo \iocms\renderer\md\Renderer::render("---\n# Core dump\n");
print_r(\iocms\Core::getInstance());
echo \iocms\renderer\md\Renderer::render("---\n# Events dump\n");
print_r(\iocms\bus\EventBus::getEvents());