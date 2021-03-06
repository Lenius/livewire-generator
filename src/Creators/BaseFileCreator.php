<?php

namespace Lenius\LivewireGenerator\Creators;

use Lenius\LivewireGenerator\Generators\Generator;
use Illuminate\Support\Facades\File;

abstract class BaseFileCreator implements FileCreatorContract
{
    protected $generator;

    protected $destination_file_name;

    protected string $main_destination_folder;

    protected string $content;

    protected bool $warn_file_exists = true;

    public array $warns = [];
    public array $infos = [];

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;

        $this->content = $this->parseContent(File::get($this->generator->stubsPath . $this->stub_path));

        $this->file_model_name = $this->getFileModelName();

        $this->main_destination_folder = $this->getMainDestinationFolder();

        $this->destination_file_name = $this->getDestinationFileLocation();
    }

    public function createFile()
    {
        if (!File::exists($this->destination_file_name)) {
            $this->handleCreateFile();
            return $this;
        }

        if ($this->overrideExistingFiles()) {
            $this->handleCreateFile();

            $this->warns[] = "File {$this->destination_file_name} exists. Pass the --force flag to override. File Not created!";

            return $this;
        }

        return $this; // Do nothing
    }

    abstract protected function getMainDestinationFolder();

    abstract protected function getFileModelName();

    protected function handleCreateFile()
    {
        File::ensureDirectoryExists($this->main_destination_folder, 0755, true);
        File::put($this->destination_file_name, $this->content);

        $this->infos[] = "File {$this->destination_file_name} has been created!";
    }

    protected function overrideExistingFiles(): bool
    {
        return $this->generator->getForce() && $this->warn_file_exists;
    }

    protected function parseContent($content)
    {
        $content = str_replace('[model-snake-plural]', $this->generator->getModelNameAsPluralSnake(), $content);
        $content = str_replace('[model-name-kebab]', $this->generator->getModelNameAsKebab(), $content);
        $content = str_replace('[model-plural]', $this->generator->getModelNameAsplural(), $content);
        $content = str_replace('[models-path]', $this->generator->getModelsDir(), $content);
        $content = str_replace('[model-snake]', $this->generator->getModelNameAsSnake(), $content);
        $content = str_replace('[model]', $this->generator->getModelName(), $content);

        return $content;
    }

    protected function getDestinationFileLocation()
    {
        return join("/", [
            $this->getMainDestinationFolder(),
            $this->file_model_name . $this->file_name_sufix,
        ]);
    }
}
