<?php

declare(strict_types = 1);

/**
 * Index
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

 require(__DIR__."/../req/autoloader.php");

if(isset($argv[2])) {
  include(__DIR__."/".$argv[1].".test.php");
  if(function_exists($argv[2])){
    $parameters = array_slice($argv, 3);
    $testResult = call_user_func($argv[2], ...$parameters);
    echo $testResult;
  } else {
    echo "Test Not Found";
  }
}
