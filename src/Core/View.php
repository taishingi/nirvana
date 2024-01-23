<?php

namespace Nirvana\Core
{
	
	use Exception;
	use Iterator;
	use Symfony\Component\HttpFoundation\Response;
	use Twig\Environment;
	use Twig\Error\LoaderError;
	use Twig\Error\RuntimeError;
	use Twig\Error\SyntaxError;
	use Twig\Loader\FilesystemLoader;
	
	class View
	{
		/**
		 * @param string 	$view
		 * @param string 	$title
		 * @param string 	$description
		 * @param string[]  $keywords
		 * @param string[]  $args
		 *
		 * @throws LoaderError
		 * @throws RuntimeError
		 * @throws SyntaxError
		 * @return Response
		 */
		public static function render(string $view, string $title, string $description, array $keywords, array $args): Response
		{
			$loader = new FilesystemLoader(VIEWS,ROOT);
			$twig = new Environment($loader,[]);
			return new Response($twig->render(sprintf("%s.twig",$view), compact('args','description','title','keywords')));
		}
	}
}