<?php
session_start();
require_once "vendor/autoload.php";
require_once "vendor/hcodebr/php-classes/src/DB/Secret.php";

use \Slim\Slim;

/*use \NewTech\Model\Delivery;
use \NewTech\Model\Local;
use \NewTech\Model\User;
use \NewTech\Page;
use \NewTech\PageAdmin;*/

use \Slim\Model\Address;

$app = new Slim();

$app->config('debug', true);

require_once("site.php");
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-locals.php");
require_once("admin-deliveries.php");

$app->run();
