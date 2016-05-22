<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\ControllerProviderInterface;

class ClienteController implements ControllerProviderInterface {

  public function connect(Application $app) {
    $factory=$app['controllers_factory'];

    $factory->get('/','App\Controllers\ClienteController::index');
    $factory->get('/create/{id}','App\Controllers\ClienteController::create');

    return $factory;
  }

  public function index(Application $app) {
    return $app['twig']->render('cliente\index.twig');
  }

  public function create(Application $app, $id) {


  return $app->json(['result' => $id]);
  }

}
