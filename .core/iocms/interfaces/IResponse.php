<?php

namespace iocms\interfaces;

interface IResponse
{
    public static function getInstance():IResponse;
    public function renderPage();
}