<?php

namespace Lenius\LivewireGenerator\Tests\Unit;

use Lenius\LivewireGenerator\Exceptions\MissingModelException;
use Lenius\LivewireGenerator\Tests\TestCase;

class LivewireGeneratorCommandTest extends TestCase
{
    /** @test */
    public function a_model_is_required()
    {
        $this->expectException(MissingModelException::class);

        $this->artisan('make:livewire-single', ['model' => 'model']);

        $command = $this->artisan('make:livewire-single', ['model' => null])
            ->expectsQuestion('Enter Model Name', null);
    }
}
