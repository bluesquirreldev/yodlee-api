<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (! ini_get('date.timezone')) {
    date_default_timezone_set('America/New_York');
}

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$yodlee = new \Yodlee\Api\Factory(getenv('COBRAND_NAME'));

// cobrand login.
$cobrandLogin = $yodlee->cobrand()->login(getenv('COBRAND_LOGIN'), getenv('COBRAND_PASSWORD'));
print '$cobrandLogin<pre>';
var_dump($cobrandLogin);
print '</pre>';
print 'getCobrandSessionToken()<pre>';
var_dump($yodlee->getSessionToken()->getCobrandSessionToken());
print '</pre>';

// providers.
$providers = $yodlee->providers()->get([
    'top' => 10
]);
print '$providers<pre>';
print_r($providers);
print '</pre>';
