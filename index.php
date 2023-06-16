<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Kareem\Ta\Parser\CsvParser;
use Kareem\Ta\Reader\CsvReader;

try {
    $csvFile = './file/examples_(4).csv';

    $reader = new CsvReader($csvFile);
    $data = $reader->readCsv();

    $csvParser = new CsvParser();
    $csvParser->parse($data);
    
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
