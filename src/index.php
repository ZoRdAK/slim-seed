<?php

require 'vendor/autoload.php';

require 'config.php';
$app = new \Slim\Slim(array(
	'view' => initSlimView()
));

require_once DIR . '/app/tools/utils.php';

require_once DIR . '/app/controllers/apps.php';


$app->run();