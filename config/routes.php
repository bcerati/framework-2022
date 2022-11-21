<?php

use App\Controller\Homepage;
use Framework\Routing\Route;

return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
    ]
];
