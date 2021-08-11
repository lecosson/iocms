<?php

namespace iocms\router;

use iocms\renderer\Renderer;

class Router
{
    /**
     * returns main content info for selected route
     * @return array of values: ['path'] - path to index page, ['renderer'] - name of preferred renderer
     */
    public static function getIndexPage() {
        chdir(ROOTDIR);

        //FIXME: move to Request class
        $queryString = $_SERVER['REQUEST_URI'];
        $filePath = realpath(ROOTDIR . parse_url($queryString)['path']);

        $res = [];
        if ($filePath && is_dir($filePath)){
            // attempt to find an index file
            function getRendererName($rendererName) { return "index.$rendererName";};
            $availableRenderers = array_values(array_intersect(
                Renderer::getRenderersPriority(),
                Renderer::getRenderersNames()
            ));
//            $renderers = array_map(function($rendererName) { return "index.$rendererName";}, $availableRenderers);
            foreach ($availableRenderers as $rname){
                if ($indexFilePath = realpath($filePath . DIRECTORY_SEPARATOR . "index." . $rname)){

                    $res['renderer'] = $rname;
                    $res['path'] = $indexFilePath;
                    break;
                }
            }
        }
        return $res;
    }
}