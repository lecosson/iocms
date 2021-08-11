<?php

namespace iocms\bus;

/**
 * Simple ist of default core events
 */
class CoreEvents
{
    // core
    /** @var Event */ public $core_bootstrap_loaded;
    /** @var Event */ public $core_created;

    /**
     * @var CoreEvents
     */
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new CoreEvents();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->core_bootstrap_loaded = new Event('core_bootstrap_loaded');
        $this->core_created = new Event('core_created');
    }
}