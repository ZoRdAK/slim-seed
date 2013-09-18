<?php

$app->get('/', function () use ($app) {
	$app->render('home', array('name' => 'Karl'));
});
