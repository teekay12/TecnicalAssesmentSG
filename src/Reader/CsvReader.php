<?php

namespace Kareem\Ta\Reader;

use \Exception;

class CsvReader
{
    public function __construct(public string $csvFile)
    {
        $this->csvFile = $csvFile;
    }

    public function readCsv(): array
    {
        $file = fopen($this->csvFile, 'r');
        if (!$file) {
            throw new Exception("Failed to open the CSV file.");
        }

        $header = fgetcsv($file);
        $data = [];

        while (($row = fgetcsv($file)) !== false) {
            $data[] = $row;
        }

        fclose($file);
        return $data;
    }
}