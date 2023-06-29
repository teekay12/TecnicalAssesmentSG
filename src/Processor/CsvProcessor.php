<?php

namespace Kareem\Ta\Processor;

use Kareem\Ta\Parser\Interface\ParserInterface;

class CsvProcessor
{
    public array $processedOutput;

    public function __construct(public ParserInterface $parserInterface)
    {
        $this->parserInterface = $parserInterface;
    }

    public function process($data): self
    {
        foreach ($data as $row) {
            $value = $row[0];
            if (empty($value)) {
                continue;
            }

            $parts = preg_split('/\s+and\s+|\s*&\s*/i', $value, 2, PREG_SPLIT_DELIM_CAPTURE);

            if (count($parts) > 1) {
                $firstPart = explode(' ', $parts[0]);
                $secondPart = explode(' ', $parts[1]);

                if(count($firstPart) == 1) {
                    $newFirstParts = implode(" ", [...$firstPart, ...$this->getName($secondPart)]);
                }
        
                $this->processedOutput[] = $this->parserInterface->parse($newFirstParts);
                $this->processedOutput[] = $this->parserInterface->parse($parts[1]);
            }else{
                $this->processedOutput[] = $this->parserInterface->parse($parts[0]);
            }
        }

        return $this;
    }

    public function write(): void
    {
        print_r(json_encode($this->processedOutput));
    }

    private function getName(array $secondParts): array 
    {
        unset($secondParts[0]);
        return [...$secondParts];
    }
}