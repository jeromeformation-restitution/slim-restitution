<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 28/03/2019
 * Time: 09:12
 */

use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\ProjetController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    return $this->view->render($response, 'home.twig');

})
    ->setName("Accueil");


$app->group('/project', function () {
    $this->get('/create', ProjetController::class.':create')
        ->setName("Création");
    $this->get('/{slug}', ProjetController::class .':show')
        ->setName("Detail");

});

$app->get('/contact', ContactController::class.':contact')
    ->setName("Contact");
$app->get('/about', AboutController::class.':about')
    ->setName("About");
