<?php
declare(strict_types = 1);
/**
 * testRun
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

$suiteToRun = $argv[1];
if(empty($suiteToRun)){
  exit("No Suite Specified");
}
$testSuites = file_get_contents(__DIR__."/testSuites.json");
$suites  = json_decode($testSuites, true);
foreach ($suites as $aKey => $aData){
  if($aKey == $suiteToRun){
    foreach ($aData as $bKey => $bData) {
      foreach ($bData as $cKey => $cData) {
        foreach ($cData as $dData) {
          foreach ($dData as $value) {
              $test = shell_exec ("php tests.php ".$cKey." ".$value);
              echo $test."\n";
          }
        }
      }
    }
  }
}
