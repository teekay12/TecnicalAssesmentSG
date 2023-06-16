<?php

namespace Kareem\Ta\Model;

use \Exception;

class Person{
    
    protected array $person = [];

    public function __construct(public string $title = "", public string $initial = "", public string $first_name = "", public string $last_name = "")
    {
        $this->title = $title;
        $this->initial = $initial;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function setInitial(string $initial): void 
    {
        $this->initial = $initial;
    }

    public function setFirstName(string $firstName): void
    {
       $this->first_name = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->last_name = $lastName;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPersonValue(): array 
    {
        if (empty($this->title) || empty($this->last_name)) {
            throw new Exception("This is required");
        }

        $person["title"] = $this->title;
        $person["initial"] = $this->initial;
        $person["first_name"] = $this->first_name;
        $person["last_name"] = $this->last_name;

        return $person;
    }
}