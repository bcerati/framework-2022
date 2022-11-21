<?php

namespace App\Controller;

use Framework\Response\Response;

class Homepage
{
  public function __invoke()
  {
      return new Response('home.html.twig');
  }
}
