<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 05.08.21
 * Time: 5:55
 */

use iocms\utils\Heart;

const ROOTDIR = __DIR__;
const COREDIR = ROOTDIR . DIRECTORY_SEPARATOR . ".core";

require_once ROOTDIR . '/vendor/autoload.php';
require_once COREDIR . '/bootstrap.php';



//use iocms\renderer\md\Renderer;
//use iocms\renderer\txt\Renderer;

//$renderer = Heart::getRenderersList()['md'];
//echo $renderer::render(file_get_contents(Heart::getIndexPage()));
$indexPage = Heart::getIndexPage();
//echo "<pre>";
//print_r($indexPage);
//print_r(Heart::getRenderersPriority());

echo Heart::render(file_get_contents($indexPage['path']), $indexPage['renderer']);