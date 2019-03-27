<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 27/03/2019
 * Time: 10:38
 */

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ContactController
{

    private $twig;

    public function __construct(Twig $twig)
    {

        $this->twig = $twig;
    }

    public function contact(Request $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        return $this->twig->render($response, 'contact.twig');
    }
}
