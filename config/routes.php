<?php

use App\Controller\Homepage;
use Framework\Routing\Route;

return [
  new Route('GET', '/', Homepage::class),
];
