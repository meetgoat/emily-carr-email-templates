<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

use ScssPhp\ScssPhp\Compiler;


$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig 	= new Environment($loader);

// Indent Filter 
$filter = new TwigFilter('indent', function ($string, $number) {
    $spaces = str_repeat(' ', $number);
    return rtrim(preg_replace('#^(.+)$#m', sprintf('%1$s$1', $spaces), $string));
}, array('is_safe' => array('all')));

$twig->addFilter($filter);

// Compile SCSS
$compiler = new Compiler();

$css = $compiler->compileString(file_get_contents('templates/_css/main.scss'))->getCss();

file_put_contents('templates/_css/main.css', $css);

// Get all templates
$files = scandir('templates');

foreach ($files as $file) {
	// Make sure we don't include directories
	if(! is_dir('templates/'. $file)){
		$final_filename = substr($file, 0, -5);
		file_put_contents('dist/' . $final_filename, $twig->render($file));
	}
}