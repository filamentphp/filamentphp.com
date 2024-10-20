<?php

require __DIR__.'/vendor/autoload.php';

use Doctum\Doctum;
use Symfony\Component\Finder\Finder;
use Doctum\Version\GitVersionCollection;
use Doctum\RemoteRepository\GitHubRemoteRepository;

$iterator = Finder::create()
	->files()
	->name('*.php')
	->exclude('stubs')
	->in($dir = __DIR__.'/filament/packages');

$versions = GitVersionCollection::create($dir)
	->add('1.x', 'Filament 1.x')
	->add('2.x', 'Filament 2.x')
	->add('3.x', 'Filament 3.x');

return new Doctum($iterator, [
	'title' => 'Filament API',
	'versions' => $versions,
	'build_dir' => __DIR__.'/build/%version%',
	'cache_dir' => __DIR__.'/cache/%version%',
	'default_opened_level' => 2,
    'remote_repository' => new GitHubRemoteRepository('filamentphp/filament', dirname($dir)),
    'base_url' => 'https://filamentphp.com/api/%version%/',
]);