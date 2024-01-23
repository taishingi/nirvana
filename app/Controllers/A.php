<?php
namespace App\Controllers {
	
	use Exception;
	use Nirvana\Core\Application;
	use Symfony\Component\HttpFoundation\Response;
	
	class A extends Application
	{
		/**
		 * @throws Exception
		 */
		public function index(): Response
		{
			return $this->render("index","nirvana","the shaolin library",["library","shaolin"],[]);
		}
	}
}
