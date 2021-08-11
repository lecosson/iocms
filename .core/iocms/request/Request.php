<?php

namespace iocms\request;

use iocms\interfaces\IRequest;

class Request implements IRequest
{
    /**
     * @var IRequest
     */
    private static $instance;

    /**
     * Singleton instantiation
     * @return IRequest
     */
    public static function getInstance():IRequest {
        if (self::$instance === null) {
            self::$instance = new Request();
//            EventBus::dispatch(CoreEvents::getInstance()->core_created);
        }
        return self::$instance;
    }
}