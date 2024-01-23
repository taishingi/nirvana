<?php

namespace Tests\unit
{
	
	use App\Controllers\A;
	use Exception;
	use Nirvana\Core\Application;
	use Nirvana\Core\View;
	use PHPUnit\Framework\Attributes\CoversClass;
	use PHPUnit\Framework\Attributes\UsesClass;
	use PHPUnit\Framework\TestCase;
	
	#[CoversClass(View::class)]
	#[CoversClass(Application::class)]
	#[UsesClass(A::class)]
	class HomepageTest extends TestCase
	{
		/**
		 * @throws Exception
		 */
		public function testIndex()
		{
			$app = new A();
			$this->assertEquals(200,$app->index()->getStatusCode());
			$this->assertNotEmpty($app->index()->getContent());
		}
	}
}