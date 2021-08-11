<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 11.08.21
 * Time: 4:10
 */

namespace iocms;


use iocms\bus\EventBus;
use iocms\bus\CoreEvents;
use iocms\interfaces\IRequest;
use iocms\interfaces\IResponse;
use iocms\request\Request;
use iocms\response\Response;

/**
 *
 */
class Core {
    /**
     * @var Core
     */
    private static $instance;

    /**
     * Singleton instantiation
     * @return Core
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Core();
            EventBus::dispatch(CoreEvents::getInstance()->core_created);
        }
        return self::$instance;
    }

    private $request;
    private $response;
    /**
     * @var array of parsed values from settings file (also with nested values)
     */
    private $settings;

    public function getSettings() {
        return $this->settings;
    }

    public function getResponse():IResponse {
        return $this->response;
    }

    public function getRequest():IRequest {
        return $this->request;
    }
    /**
     * Create Core instance
     */
    private function __construct() {
        $this->settings = json_decode(file_get_contents(COREDIR.DIRECTORY_SEPARATOR.'.settings.json'),true);
        $this->request = Request::getInstance();
        $this->response = Response::getInstance();
    }
} 