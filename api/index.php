<?php

require 'vendor/autoload.php';

use Illuminate\Http\Request;

$app = require_once __DIR__.'/../bootstrap/app.php';

$request = Request::capture();
$response = $app->handle($request);
$response->send();