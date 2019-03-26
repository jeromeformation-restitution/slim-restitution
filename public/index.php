<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require dirname(__DIR__).'/vendor/autoload.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->group('/project', function () {
    $this->get('/{id:\d+}', function (Request $request, Response $response, array $args) {
        $name = $args['id'];
        $response->getBody()->write("Hello, $name");

        return $response;
    });
    $this->get('/creation', function (Request $request, Response $response, array $args) {
        $response->getBody()->write("Hello depuis création");

        return $response;
    });
});


$app->run();
