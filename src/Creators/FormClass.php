<?php

namespace Lenius\LivewireGenerator\Creators;

class FormClass extends BaseFileCreator
{
    protected string $stub_path = '/../classes/form.php';

    protected string $file_name_sufix = 'Form.php';

    protected string $file_model_name;

    protected bool $warn_file_exists = true;

    protected function getFileModelName()
    {
        return $this->generator->getModelName();
    }

    protected function getMainDestinationFolder()
    {
        return app_path('Http/Livewire/') .
            $this->file_model_name;
    }
}
