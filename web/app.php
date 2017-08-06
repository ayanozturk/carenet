<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

$environment = getenv('EXPERT_ENV') ? getenv('EXPERT_ENV') : 'prod';
$debug = ($environment === 'dev');

$kernel = new AppKernel($environment, $debug);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
