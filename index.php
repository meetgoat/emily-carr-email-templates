<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$files = scandir('templates');

foreach ($files as $file) {
	// Make sure we don't include relative directories
	if ( !in_array($file,array(".","..","_layouts", "_css")) ) {
		$final_filename = substr($file, 0, -5);
		file_put_contents('dist/' . $final_filename, $twig->render($file));
	}
}