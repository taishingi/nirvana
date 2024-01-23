<?php

namespace Nirvana\Console
{
	
	use InvalidArgumentException;
	use Symfony\Component\Console\Command\Command;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Input\InputOption;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Style\SymfonyStyle;
	
	class CreateController extends Command
	{
		public function __construct(string $name = "make:controller")
		{
			parent::__construct($name);
		}
		
		public function configure(): void
		{
			$this->setDescription("Generate a new controller");
			$this->setHelp("php shaolin make:controller <name>");
			$this->addArgument("controller", InputOption::VALUE_REQUIRED, "The name of the new controller");
		}
		
		public function execute(InputInterface $input, OutputInterface $output): int
		{
			$style = new SymfonyStyle($input, $output);
			
			if ($input->hasArgument("controller"))
			{
				try
				{
					$controller = strval($input->getArgument("controller"));
				}catch (InvalidArgumentException $e)
				{
					$style->error($e->getMessage());
					return Command::FAILURE;
				}
				
				if (is_dir($controller))
				{
					$style->error("The given controller name is a directory");
					return Command::FAILURE;
				}
				$class = ucfirst(str_replace(".php", "", strtolower($controller)));
				$handle = fopen(sprintf("%s%s%s.php", CONTROLLERS, DIRECTORY_SEPARATOR, $class), "w+");
				if (!$handle)
				{
					return Command::FAILURE;
				}
				if (!fwrite($handle, "<?php\nnamespace App\Controllers {\n\n\tuse Nirvana\Core\Application;\n\n\tclass $class extends Application\n\t{\n\n\t}\n}\n")){
					return  Command::FAILURE;
				}
				if (fclose($handle))
				{
					$style->success("Controller has been generated successfully");
					return Command::SUCCESS;
				}
				$style->error("Generation of the controller has fail");
				return Command::FAILURE;
			}
			$style->error("missing controller argument");
			return Command::FAILURE;
		}
	}
}