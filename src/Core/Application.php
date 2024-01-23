<?php

namespace Nirvana\Core;

use Exception;
use Symfony\Component\HttpFoundation\Response;

abstract class Application
{
	
	/**
	 * @param string 	$view
	 * @param string 	$title
	 * @param string 	$description
	 * @param string[]  $keywords
	 * @param string[]  $args
	 *
	 * @throws Exception
	 * @return Response
	 */
	protected function render(string $view,string $title,string $description,array $keywords, array $args): Response
	{
		return View::render($view, $title,$description,$keywords,$args);
	}
}