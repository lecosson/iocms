<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 11.08.21
 * Time: 4:10
 */

namespace iocms\bus;


/**
 *
 */
class Event {

    /**
     * @var string event type identifier
     */
    private $literal;

    /**
     * get event type
     * @return string
     */
    public function getLiteral() {
        return $this->literal;
    }

    /**
     * @var array Event data
     */
    private $data;
    /**
     * get event data
     * @return array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * dispatch event to EventBus
     */
    public function dispatch() {
        EventBus::dispatch($this);
    }

    /**
     * @param string $literal event type identifier
     * @param array $data event data
     */
    public function __construct(string $literal = 'empty', array $data = []) {
        $this->literal = $literal;
        $this->data = $data;
    }
} 