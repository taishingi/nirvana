<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\create;
use function DI\get;

return [
	"models" => MODELS,
	"views" => VIEWS,
	"controllers" => CONTROLLERS,
	"loader" => create(FilesystemLoader::class)->constructor(VIEWS, ROOT),
	"twig" => create(Environment::class)->constructor(get("loader"), ['debug' => true])
];