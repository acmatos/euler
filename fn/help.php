<?php

class Help {

	public static function parseDocComment($docComment)
	{
	    $title = implode(PHP_EOL, array_filter(explode(PHP_EOL, $docComment), function($item) { return strpos($item, '@title'); }));
	    $description = array_filter(explode(PHP_EOL, $docComment), function($item) use($title) { return $title!=$item; });
	    return ['title' => str_replace('* @title - ', '', trim($title)), 'description' => implode(PHP_EOL, $description)];
	}
}