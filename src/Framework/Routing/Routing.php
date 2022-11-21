<?php

namespace Framework\Routing;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Framework\Config\Config;
use Framework\Exception\RouteNotFoundException;
use Framework\Exception\RoutingMethodNotAllowed;
use Framework\Response\Response;
use Psr\Http\Message\ServerRequestInterface;

use function FastRoute\simpleDispatcher;

class Routing
{
  private static ?Routing $instance = null;

  protected Dispatcher $dispatcher;

  public static function init(): self
  {
    if (self::$instance === null) {
      self::$instance = new self();
      self::$instance->initDispatcher();
    }

    return self::$instance;
  }

  public function route(ServerRequestInterface $request)
  {
    $httpMethod = $request->getMethod();

    $uri = $request->getRequestTarget();

    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }

    $uri = rawurldecode($uri);
    
    $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);

    switch ($routeInfo[0]) {
        case Dispatcher::NOT_FOUND:
            throw new RouteNotFoundException(sprintf(
              'No controller found for uri %s',
              $uri
            ));
            break;
        case Dispatcher::METHOD_NOT_ALLOWED:
            throw new RoutingMethodNotAllowed(sprintf(
              'Method %s is not allowed for uri %s',
              $httpMethod,
              $uri
            ));
            break;
        case Dispatcher::FOUND:
            $controller = $routeInfo[1];
            $vars = $routeInfo[2];

            if (class_exists($controller)) {
              return Response::buildWithController($controller, $vars);
            }
            echo 'error';die;
            break;
    }


  }

  protected function initDispatcher()
  {
    $dispatcher = simpleDispatcher(function(RouteCollector $r) {
        $routes = Config::get('routing');

        foreach ($routes as $route) {
          $r->addRoute($route->getMethod(), $route->getUrl(), $route->getController());
        }
    });

    $this->dispatcher = $dispatcher;
  }
}
