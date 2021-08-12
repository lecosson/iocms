<?php

namespace iocms\renderer;

use iocms\Core;

class Renderer
{
    /**
     * return user-defined ordered list of available renderers to avoid wrong renderer selection
     * @return array
     */
    public static function getRenderersPriority() {
//        return self::getSettings()['renderersPriority'];
        return Core::getInstance()->getSettings()['renderersPriority'];
    }

    /**
     * Get flat list of renderer's names
     * @return array
     */
    public static function getRenderersNames() {
        $rawlist = scandir(COREDIR . DIRECTORY_SEPARATOR . 'iocms' . DIRECTORY_SEPARATOR . 'renderer');
        $filteredlist = array_values(array_filter($rawlist, function($name) {
            return $name[0]!=='.';
        }));
        return $filteredlist;
    }

    /**
     * Get list of renderers: ['renderer name'] => {renderer class}
     * @return array
     */
    public static function getRenderersList() {
        $reslist = [];
        foreach (self::getRenderersNames() as $cname){
            $reslist[$cname] = 'iocms\\renderer\\'.$cname.'\\Renderer';
        }
        return $reslist;
    }

    /**
     * @param $content
     * @param $rendererName
     * @return mixed
     */
    public static function renderContent($content, $rendererName) {
        $renderer = self::getRenderersList()[$rendererName];
        return $renderer::render($content);
    }
}