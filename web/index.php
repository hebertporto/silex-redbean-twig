<?php
require_once __DIR__.'/../bootstrap.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;


$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new JDesrosiers\Silex\Provider\CorsServiceProvider(), array(
    "cors.allowOrigin" => "*",
    "cors.allowMethods:" => "GET, POST, PUT,DELETE,OPTIONS"
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->get('/', function () {
  return new Response(' Roda / OK!', 201);
});

$app->mount('/cliente', new App\Controllers\ClienteController());

$app->after($app["cors"]);
$app->run();
