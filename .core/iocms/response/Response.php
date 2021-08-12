<?php

namespace iocms\response;

use iocms\interfaces\IResponse;
use iocms\renderer\Renderer;
use iocms\router\Router;

class Response implements IResponse
{
    /**
     * @var IResponse
     */
    private static $instance;

    /**
     * Singleton instantiation
     * @return IResponse
     */
    public static function getInstance():IResponse {
        if (self::$instance === null) {
            self::$instance = new Response();
//            EventBus::dispatch(CoreEvents::getInstance()->core_created);
        }
        return self::$instance;
    }

    public function renderPage():string {
        //TODO: implement rendering (move from deprecated Heart class)
        $indexPage = Router::getIndexPage();
        return Renderer::renderContent(file_get_contents($indexPage['path']), $indexPage['renderer']);
    }

}