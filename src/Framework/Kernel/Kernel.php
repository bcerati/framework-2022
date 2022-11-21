<?php

namespace Framework\Kernel;

use Framework\Response\Response;
use Framework\Routing\Routing;
use Framework\Templating\TemplatingInterface;
use Psr\Http\Message\ServerRequestInterface;

class Kernel
{
  protected Routing $routing;
  protected TemplatingInterface $templating;

  public function __construct(TemplatingInterface $templating)
  {
    $this->routing = Routing::init();
    $this->templating = $templating;
  }

  public function handleRequest(ServerRequestInterface $request)
  {
    return $this->routing->route($request);
  }

  public function display(Response $response)
  {
      echo $this->templating->render($response);
  }
}

