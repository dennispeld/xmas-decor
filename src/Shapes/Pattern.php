<?php

namespace App\Shapes;

interface Pattern
{
    public function get($size): array;
}