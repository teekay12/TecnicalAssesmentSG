<?php

namespace Kareem\Ta\Parser;

use Kareem\Ta\Model\Person;
use Kareem\Ta\Parser\Interface\ParserInterface;

class HomeOwnersParser implements ParserInterface
{
    public function parse(string $part): Person
    { 
        $part = explode(' ', $part);
        $title = $part[0];
        $lastName = "";

        foreach ($part as $index => $item) {
            if ($index == 0) {
                continue;
            }

            if (str_contains($item, '.') || strlen($item) == 1) {
                $initial = str_replace('.', '', $item);
                continue;
            }

            if ((count($part) - 1) == $index) {
                $lastName = $item;
                continue;
            }
            
            $firstName = $item;
        }

        return new Person(
            $title,
            $initial ?? null,
            $firstName ?? null,
            $lastName
        );
    }
}