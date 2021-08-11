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



//use iocms\renderer\md\Renderer;
//use iocms\renderer\txt\Renderer;

//$renderer = Heart::getRenderersList()['md'];
//echo $renderer::render(file_get_contents(Heart::getIndexPage()));
$indexPage = Router::getIndexPage();
//echo "<pre>";
//print_r($indexPage);
//print_r(Heart::getRenderersPriority());

echo Renderer::render(file_get_contents($indexPage['path']), $indexPage['renderer']);

Core::getInstance()->getResponse()->render();
Core::getInstance()->getResponse()->getRendered();

echo '<hr/>';

echo '<hr/>';
echo('<pre>');
print_r(\iocms\Core::getInstance());
print_r(\iocms\bus\EventBus::getEvents());