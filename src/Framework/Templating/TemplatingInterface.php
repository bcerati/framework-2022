<?php

namespace Framework\Templating;

use Framework\Response\Response;

interface TemplatingInterface
{
    public function render(Response $response): string;
}
