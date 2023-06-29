<?php

namespace Kareem\Ta\Model;

use \Exception;

class Person {

    public function __construct(public string $title, public ?string $initial = null, public ?string $firstName = null, public string $lastName)
    {
        if (empty($title) || empty($lastName)) {
            throw new Exception("Title or last name is required!");
        }

        $this->title = $title;
        $this->initial = $initial;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}