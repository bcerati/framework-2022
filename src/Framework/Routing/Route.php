<?php

namespace Framework\Routing;

class Route
{
  public function __construct(
    protected string $method,
    protected string $url,
    protected string $controller,
  ) {
  }

  public function getMethod(): string
  {
    return $this->method;
  }
  
  public function setMethod(string $method): self
  {
    $this->method = $method;

    return $this;
  }

  public function getUrl(): string
  {
    return $this->url;
  }
  
  public function setUrl(string $url): self
  {
    $this->url = $url;

    return $this;
  }

  public function getController(): string
  {
    return $this->controller;
  }
  
  public function setController(string $controller): self
  {
    $this->controller = $controller;

    return $this;
  }
}

