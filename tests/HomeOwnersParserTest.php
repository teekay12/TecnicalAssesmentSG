<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use Kareem\Ta\Parser\HomeOwnersParser;

class HomeOwnersParserTest extends TestCase {

    /**
     * @dataProvider provideHomeOwnersData
     */
    public function test_it_maps_correctly($homeOwner, $expectedTitle, $expectedInitial, $expectedFirstName, $expectedLastName): void
    {
        $homeOwnersParse = new HomeOwnersParser();
        $person = $homeOwnersParse->parse($homeOwner);
        
        $this->assertSame($expectedFirstName, $person->firstName);
        $this->assertSame($expectedLastName, $person->lastName);
        $this->assertSame($expectedTitle, $person->title);
        $this->assertSame($expectedInitial, $person->initial);
    }

    public static function provideHomeOwnersData() : array {
        return [
            ["Mr John Smith", "Mr", null, "John", "Smith"]
        ];
    }
}