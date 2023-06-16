<?php

namespace Kareem\Ta\Parser;

use Kareem\Ta\Parser\NameParser;

class CsvParser 
{
    public function parse($data): void
    {
        $parser = new NameParser();

        foreach ($data as $row) {
            foreach ($row as $value) {
                if (!empty($value)) {
                    $parts = preg_split('/\s+and\s+|\s*&\s*/i', $value, 2, PREG_SPLIT_DELIM_CAPTURE);
                    
                    $firstParts = explode(' ', $parts[0]);
    
                    if(count($parts) > 1){
                        $secondParts = explode(' ', $parts[1]);
                
                        // Fill $firstParts with missing key=>value from $secondParts
                        foreach ($secondParts as $key => $value) {
                            if (!isset($firstParts[$key])) {
                                $firstParts[$key] = $value;
                            }
                        }
    
                        print_r($parser->parse($firstParts));
                        print_r($parser->parse($secondParts));
                    }else{
                        print_r($parser->parse($firstParts));
                    }
                }
            }
        }
    }
}