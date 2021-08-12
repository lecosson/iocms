<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 05.08.21
 * Time: 6:21
 */

namespace iocms\renderer\txt;

use iocms\interfaces\IRenderer;

class Renderer implements IRenderer {

    public static function render($content) {
        return $content;
    }

}