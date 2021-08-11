<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 11.08.21
 * Time: 4:09
 */

namespace iocms\bus;


class EventBus {

    private static $bus = [];

    public static function getEvents() {
        return self::$bus;
    }
    public static function dispatch(Event $e) {
        array_push(self::$bus, $e);
        //TODO: process events
    }
}
