<?php

namespace App\Helper\Factory\Int;

interface EntityFactoryInterface
{
    public function createEntity(string $stringJson): ?object;
}