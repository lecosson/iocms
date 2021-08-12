<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 05.08.21
 * Time: 6:21
 */

namespace iocms\renderer\md;


use iocms\interfaces\IRenderer;
use League\CommonMark\CommonMarkConverter;

class Renderer implements IRenderer {

    public static function render($content):string {
        $converter = new CommonMarkConverter();
        return $converter->convertToHtml($content);
    }

}