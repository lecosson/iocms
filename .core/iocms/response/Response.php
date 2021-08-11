<?php

namespace iocms\response;

use iocms\interfaces\IResponse;

class Response implements IResponse
{
    /**
     * @var IResponse
     */
    private static $instance;

    private $rendered = '';

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

    public function render() {
        //TODO: implement rendering (move from deprecated Heart class)
    }

    public function getRendered():string {
        return $this->rendered;
    }

}