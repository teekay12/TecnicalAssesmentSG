<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Kareem\Ta\Parser\HomeOwnersParser;
use Kareem\Ta\Reader\CsvReader;
use Kareem\Ta\Processor\CsvProcessor;

try {
    $csvFile = './file/examples_(4).csv';

    $reader = new CsvReader($csvFile);
    $csvContent = $reader->readCsv();

    $homeOwners = new HomeOwnersParser();
    $csvProcessor = new CsvProcessor($homeOwners);
    $csvProcessor->process($csvContent)->write();
    
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
