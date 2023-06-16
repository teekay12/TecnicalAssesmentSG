<?php

namespace Kareem\Ta\Parser;

use Kareem\Ta\Model\Person;

class NameParser
{
    public function parse(array $part): array
    { 
        $person = new Person();

        $person->setTitle($part[0]);

        foreach ($part as $index => $item) {
            if ($index == 0) {
                continue;
            }

            if (str_contains($item, '.') || strlen($item) == 1) {
                $person->setInitial(str_replace('.', '', $item));
                continue;
            }

            if ((count($part) - 1) == $index) {
                $person->setLastName($item);
                continue;
            }

            $person->setFirstName($item);
        }

        return $person->getPersonValue();
    }
}