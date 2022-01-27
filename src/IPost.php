<?php

namespace Lucas\Playground;

use Stringable;

interface IPost extends Stringable
{
    public function output(callable $mapper): mixed;
}
