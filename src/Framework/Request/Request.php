<?php

namespace Framework\Request;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\ServerRequestInterface;

class Request
{
  public static function fromGlobals(): ServerRequestInterface
  {
    $psr17Factory = new Psr17Factory();

    $creator = new ServerRequestCreator(
        $psr17Factory,
        $psr17Factory,
        $psr17Factory,
        $psr17Factory
    );

    return $creator->fromGlobals();
  }
}

