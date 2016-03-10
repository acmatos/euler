<?php

ini_set('highlight.string','#888888');

require 'fn/help.php';
require 'fn/math.php';
require 'fn/euler.php';


$reflectionClass = new ReflectionClass('Euler');
$methodArray = $reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC);

require 'list.php';
require 'view/nav.php';

if(empty($problemArray)) {
	$empty = true;
	require 'view/layout.php';
}
else {
	foreach($problemArray as $problem) {
		require 'view/layout.php';
	}
}