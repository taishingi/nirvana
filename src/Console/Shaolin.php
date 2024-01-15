<?php

namespace Nirvana\Console
{
	
	use Exception;
	use Symfony\Component\Console\Application;
	
	class Shaolin
	{
		private Application $application;
		
		public function __construct()
		{
			$this->application = new Application("shaolin", "1.0");
			$this->application->addCommands([
				new CreateController()
			]);
		}
		
		/**
		 * @throws Exception
		 */
		public function run(): int
		{
			return $this->application->run();
		}
	}
	
}