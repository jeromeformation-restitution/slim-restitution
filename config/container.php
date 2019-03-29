<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 28/03/2019
 * Time: 09:12
 */

// Get container
use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\ProjetController;
use App\Generic\Connection;
use App\Repository\ProjectRepository;
use Psr\Container\ContainerInterface;
use Slim\Http\Uri;
use Slim\Views\Twig;

$container = $app->getContainer();

// Register component on container
$container['view'] = function (ContainerInterface $container) {
    $view = new Twig(dirname(__DIR__) .'/templates', [
        'cache' => false,
        'debug' => true
    ]);
    $view->addExtension(new \Twig\Extension\DebugExtension());
    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container [ProjetController::class]  = function (ContainerInterface $container) {
    return new ProjetController(
        $container['view'],
        $container[ProjectRepository::class]
    );
};

$container [ContactController::class]  = function (ContainerInterface $container) {
    return new ContactController($container['view']);
};

$container [AboutController::class]  = function (ContainerInterface $container) {
    return new AboutController($container['view']);
};

$container [Connection::class]  = function (ContainerInterface $container) {
    return new Connection(
        $container ['settings']['database'],
        $container ['settings']['user'],
        $container ['settings']['pass']
    );


};

$container [ProjectRepository::class]  = function (ContainerInterface $container) {
    return new ProjectRepository($container[Connection::class]);
};