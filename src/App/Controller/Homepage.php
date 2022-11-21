<?php

namespace App\Controller;

use Framework\Config\Config;
use Framework\Response\Response;

class Homepage
{
  public function __invoke()
  {
      return new Response('home.html.twig');
  }
}
