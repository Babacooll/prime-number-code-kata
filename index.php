<?php

use OptimusPrime\OptimusPrime;
use OptimusPrime\Strategy\AdvancedPrimeNumberStrategy;
use OptimusPrime\Strategy\BasicPrimeNumberStrategy;
use OptimusPrime\Strategy\MillerRabinPrimeNumberStrategy;

require 'vendor/autoload.php';

/*
 * 878978 --> AD
 * 78978978787897 --> AD
 * 57587675578678786 --> MI
 * 78966876687878786986896688 --> AD
 * 7687667867867867677866778676786 --> MI
 */

$optimusPrime = new OptimusPrime();

$number = $argv[1];

$start  = microtime(true);
$result = $optimusPrime->getHighestPrimeNumberInNumber($number, new BasicPrimeNumberStrategy());
$end    = microtime(true);

echo '[BASIC] Result : ' . $result . ' | Execution time : ' . ($end - $start) . ' s' . PHP_EOL;

$start  = microtime(true);
$result = $optimusPrime->getHighestPrimeNumberInNumber($number, new AdvancedPrimeNumberStrategy());
$end    = microtime(true);

echo '[ADVANCED] Result : ' . $result . ' | Execution time : ' . ($end - $start) . ' s' . PHP_EOL;

$start  = microtime(true);
$result = $optimusPrime->getHighestPrimeNumberInNumber($number, new MillerRabinPrimeNumberStrategy());
$end    = microtime(true);

echo '[MILLER-RABIN] Result : ' . $result . ' | Execution time : ' . ($end - $start) . ' s' . PHP_EOL;
