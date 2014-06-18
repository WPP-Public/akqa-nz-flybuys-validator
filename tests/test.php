<?php

require_once __DIR__.'/../vendor/autoload.php';

$codes = [
    "6014359000000928",
    "6014355065446212",
    "6014351000254605",
    "6014359000000019",
    "6014359000000027",
    "60143590000001128",
    "6014359000000126",
    "6014359000000217"
];

$passed = true;

foreach ($codes as $code) {
    if (Flybuys\validate($code)) {
        echo 'Passed: ' . $code, PHP_EOL;
    } else {
        echo 'Failed: ' . $code, PHP_EOL;
        $passed = false;
    }
}

exit($passed ? 0 : 1);
