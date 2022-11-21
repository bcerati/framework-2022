<?php

namespace Framework\Response;

use Framework\Exception\FrameworkException;

class Response
{
  public function __construct(
    protected string $template,
    protected array $args = []
    ) {
    }

  public static function buildWithController(string $controller, array $args): Response
  {
    $controller = new $controller();

    if (!is_callable($controller)) {
      throw new FrameworkException('You controller is not a valid callable!');
    }

    return $controller($args);
  }

  public function getTemplate(): string
  {
      return $this->template;
  }

  public function getArgs(): array 
  {
      return $this->args;
  }
}
