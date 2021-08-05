<?php

namespace Lenius\LivewireGenerator\Commands;

use Lenius\LivewireGenerator\Exceptions\MissingModelException;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class LivewireSingle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:livewire-single
        {model? : Model}
        {--force : Override existing files!}
        {--preset=bootstrap : Frontend scafold preset!}
        {--models-dir=App\Models : Here you can specify your models directory}';

    protected $description = 'Create a livewire component';

    protected $modelName;

    protected $generators = [
        'bootstrap' => \Lenius\LivewireGenerator\Generators\Bootstrap::class,
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->handleArguments();

        $generator = new $this->generators[$this->option('preset')](
            $this->modelName,
            $this->option('force'),
            $this->option('models-dir'),
        );

        $generator->handle();

        foreach ($generator->warns as $value) {
            foreach ($value as $message) {
                $this->warn($message);
            }
        }

        foreach ($generator->infos as $value) {
            foreach ($value as $message) {
                $this->info($message);
            }
        }

        return 0;
    }

    protected function handleArguments()
    {
        $this->modelName = Str::studly($this->argument('model'));

        if (!$this->argument('model')) {
            $model = $this->ask("Enter Model Name");
            if (!$model || strlen($model) < 2) {
                throw new  MissingModelException("Please enter a valid Model name!");
            }
            $this->modelName = Str::studly($model);
        }

        return $this;
    }
}
