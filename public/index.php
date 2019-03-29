<?php

use Slim\App;

require dirname(__DIR__).'/vendor/autoload.php';

$config = require dirname(__DIR__) . "/config/config.php" ;
// $app = new \Slim\App($config);
$app = new App($config);


require_once dirname(__DIR__). "/config/container.php" ;
require_once dirname(__DIR__). "/config/routes.php" ;






$app->run();
