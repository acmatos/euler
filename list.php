<?php

$euler = new Euler();
$problemArray = [];
foreach($methodArray as $k => $method) {
    $reflectionMethod = $reflectionClass->getMEthod($method->name);

    if($method->class != 'Euler') {
        unset($methodArray[$k]);
        continue;
    }

    if(!empty($_GET['detail']) && $reflectionMethod->name != 'problem_'.$_GET['detail']) {
        continue;
    }

    $start = microtime(true);
    $solution = $euler->{$reflectionMethod->name}();
    $executionTime = microtime(true) - $start;

    $comment = Help::parseDocComment($reflectionMethod->getDocComment());

    $problemArray[] = [
        'name' => $reflectionMethod->name,
        'title' => $comment['title'],
        'description' => $comment['description'],
        'code' => implode('',
            array_slice(
                file($reflectionClass->getFileName()),
                $reflectionMethod->getStartLine() - 1,
                $reflectionMethod->getEndLine() - ($reflectionMethod->getStartLine() - 1)
            )
        ),
        'solution' => $solution,
        'executionTime' => $executionTime # array_sum($executionTimeArray)/count($executionTimeArray),
    ];
}
