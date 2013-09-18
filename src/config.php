<?php

define('DIR', dirname(__FILE__));
define('DIR_TPL', DIR . '/app/templates/');


function initSlimView()
{
	$twig = new \Slim\Views\Twig();
	$twig->parserDirectory = 'vendor/twig/twig/lib/Twig';
	$twig->setTemplatesDirectory(DIR_TPL);

	$filter = new Twig_SimpleFilter('toUrl', 'toUrl');
	$twig->getInstance()->addFilter($filter);

	return $twig;
}