<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 05.08.21
 * Time: 7:42
 */


namespace iocms\utils;

class Heart
{
    private static $settings = null;

    /**
     * Parse and provide settings from settings file
     * TODO: apply plugins support
     * @return array of parsed values from settings file (also with nested values)
     */
    public static function getSettings() {
        if (self::$settings === null) {
            self::$settings = json_decode(file_get_contents(COREDIR.DIRECTORY_SEPARATOR.'.settings.json'),true);
        }
        return self::$settings;
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
     * return user-defined ordered list of available renderers to avoid wrong renderer selection
     * @return array
     */
    public static function getRenderersPriority() {
        return self::getSettings()['renderersPriority'];
    }

    /**
     * returns main content info for selected route
     * @return array of values: ['path'] - path to index page, ['renderer'] - name of preferred renderer
     */
    public static function getIndexPage() {
        chdir(ROOTDIR);

        $queryString = $_SERVER['REQUEST_URI'];
        $filePath = realpath(ROOTDIR . parse_url($queryString)['path']);

        $res = [];
        if ($filePath && is_dir($filePath)){
            // attempt to find an index file
            function getRendererName($rendererName) { return "index.$rendererName";};
            $availableRenderers = array_values(array_intersect(
                Heart::getRenderersPriority(),
                Heart::getRenderersNames()
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

    /**
     * @param $content
     * @param $rendererName
     * @return mixed
     */
    public static function render($content, $rendererName) {
        $renderer = Heart::getRenderersList()[$rendererName];
        return $renderer::render($content);
    }
}