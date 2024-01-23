<?php

use App\Controllers\A;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor/autoload.php";


try
{
	(new A())->index()->send();
}
catch (Exception $e)
{
	echo $e->getMessage();
}
