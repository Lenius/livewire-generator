<?php

namespace App\Http\Livewire\[model];

use [models-path]\[model];
use Livewire\Component;

class [model]Form extends Component
{
    public [model] $[model-snake];

    protected $rules = [
        '[model-snake].name'                 => 'required|string',
        //'{{modelLower}}.email'              => 'required|email',
        //'{{modelLower}}.address1'           => 'nullable|string',
        //'{{modelLower}}.is_admin'           => 'boolean',
    ];

    public function mount($[model-snake]Id)
    {
        $this->[model-snake] = [model]::findOrFail($[model-snake]Id);
    }

    public function render()
    {
        return view('livewire.[model-name-kebab].[model-name-kebab]-form')->layout('layouts.admin');
    }

    public function save()
    {
        $this->validate();

        $this->[model-snake]->save();
    }
}
