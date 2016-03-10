<?php

if(empty($_GET['detail'])) {
    trigger_error('Invalid option...');
    return;
}

foreach($methodArray as $method) {
    $reflectionMethod = $reflectionClass->getMEthod($method->name);

    if($reflectionMethod->name != 'problem_'.$_GET['detail']) {
        continue;
    }

    $executionTimeArray = [];
    foreach(range(1,5) as $test) {
        $start = microtime(true);
        $solution = Euler::{$reflectionMethod->name}();
        $executionTimeArray[] = microtime(true) - $start;
    }

    $comment = parseDocComment($reflectionMethod->getDocComment());

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
        'executionTime' => array_sum($executionTimeArray)/count($executionTimeArray),
    ];
}
