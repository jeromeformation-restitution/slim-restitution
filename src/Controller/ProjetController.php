<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ProjetController
{
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;

    }

    public function show(Request $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        $startedAt = new\DateTime('2019-01-01');
        $finishedAt = new\DateTime();

        $project=[
            'id'=> 55,
            'name'=>'mon site',
            'description'=>'<p>super avec slim c\'est genial</p>',
            'languages'=>["html", "php", "jquery", "sql"],
            'startedAt'=> $startedAt,
            'finishedAt'=>$finishedAt,
            'image'=>'sit.png'



        ];
        return $this->twig->render($response, 'show.twig', ['project'=>$project]);

    }

    public function create(Request $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        return $this->twig->render($response, 'create.twig');
    }
}
