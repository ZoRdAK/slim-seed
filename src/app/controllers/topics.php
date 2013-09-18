<?php

require_once DIR . '/app/models/Topic.php';

$app->group('/topics', function () use ($app) {


	$app->get('/new', function () use ($app) {
		$app->render('topics/new.twig');
	});

	$app->get('/delete/:id', function ($id) use ($app) {
		$Topic = Topic::findById($id);
		$Topic->destroy();
		$app->redirect(toUrl('/topics/'));
	});



	$app->get('/', function () use ($app) {
		$Topics = Topic::findAll();
		$app->render('topics/list.twig', array('topics' => $Topics));
	});

	$app->post('/', function () use ($app) {
		$data = $app->request()->post();
		$topic = new Topic($data);
		if ($topic->save()) {
			$app->redirect(toUrl('/topics/' . $topic->getID()));
		} else {
			die('Failed adding topic');
		}
	});

	$app->get('/:id', function ($id) use ($app) {
		$Topic = Topic::findById($id);
		$app->render('topics/view.twig', array('topic' => $Topic));
	});
});
