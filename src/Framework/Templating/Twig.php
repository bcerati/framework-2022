<?php

namespace Framework\Templating;

use Framework\Config\Config;
use Framework\Response\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig implements TemplatingInterface
{
    protected FilesystemLoader $loader;
    protected Environment $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(Config::get('TEMPLATES_PATH'));
        $this->twig = new Environment($this->loader, [
            //'cache' => '/path/to/compilation_cache',
        ]);
    }

    public function render(Response $response): string
    {
        return $this->twig->render($response->getTemplate(), $response->getArgs());
    }
}
