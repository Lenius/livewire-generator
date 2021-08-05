<?php

namespace Lenius\LivewireGenerator\Creators;

use Lenius\LivewireGenerator\Generators\Generator;

interface FileCreatorContract
{
    public function __construct(Generator $generator);

    public function createFile();
}
