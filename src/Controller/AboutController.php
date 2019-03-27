<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class AboutController
{
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function about(Request $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        return $this->twig->render($response, 'about.twig');
    }
}
