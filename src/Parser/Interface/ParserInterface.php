<?php

namespace Kareem\Ta\Parser\Interface;

interface ParserInterface {
    public function parse(string $part): object;
}