<?php

require 'vendor/autoload.php';

require 'config.php';
$app = new \Slim\Slim(array(
	'view' => initSlimView()
));

require_once DIR . '/app/tools/utils.php';
require_once DIR . '/app/tools/Db.php';

require_once DIR . '/app/controllers/apps.php';
require_once DIR . '/app/controllers/topics.php';

Db::connect('slimseed');

$app->run();