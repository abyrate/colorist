<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder
	::create()
	->files()
	->name('*.php')
	->exclude('Resources')
	->exclude('Tests')
	->in(__DIR__ . '/src');

return new Sami($iterator, [
	'title'     => 'Colorist Docs',
	'build_dir' => __DIR__ . '/docs',
	'cache_dir' => __DIR__ . '/sami_cache',
]);