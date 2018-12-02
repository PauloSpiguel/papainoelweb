<?php

use \NewTech\Page;

################## ROTA HOME PAGE ###############
$app->get('/', function () {

    $page = new Page();

    $page->setTpl("index");

});

?>