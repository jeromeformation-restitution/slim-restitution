<?php
namespace App\Controller;

use App\Repository\ProjectRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ProjetController
{
    private $twig;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(Twig $twig, ProjectRepository $projectRepository)
    {
        $this->twig = $twig;

        $this->projectRepository = $projectRepository;
    }
    public function list(Request $request, ResponseInterface $response): ResponseInterface
    {
        $projects = $this->projectRepository->findAll();
        return $this->twig->render($response, 'list.twig', ['projects' => $projects]);
    }

    public function show(Request $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        $startedAt = new\DateTime('2019-01-01');
        $finishedAt = new\DateTime();

        $project=$this->projectRepository->findBySlug($args['slug']);
        return $this->twig->render($response, 'show.twig', ['project'=>$project]);
    }

    public function create(Request $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        return $this->twig->render($response, 'create.twig');
    }
}
