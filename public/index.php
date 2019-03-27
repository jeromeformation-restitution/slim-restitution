<?php

use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\ProjetController;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Uri;
use Slim\Views\Twig;

require dirname(__DIR__).'/vendor/autoload.php';

$app = new \Slim\App;

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new Twig(dirname(__DIR__) .'/templates', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container [ProjetController::class]  = function (ContainerInterface $container) {
    return new ProjetController($container['view']);
};

$container [ContactController::class]  = function (ContainerInterface $container) {
    return new ContactController($container['view']);
};

$container [AboutController::class]  = function (ContainerInterface $container) {
    return new AboutController($container['view']);
};

$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    return $this->view->render($response, 'home.twig');
});

$app->group('/project', function () {
    $this->get('/{id:\d+}', ProjetController::class .':show');
    $this->get('/create', ProjetController::class.':create');
    $this->get('/contact', ContactController::class.':contact');
    $this->get('/about', AboutController::class.':about');
});


$app->run();
