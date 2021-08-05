<?php

namespace App\Http\Livewire\[model];

use [models-path]\[model];
use Livewire\Component;
use Livewire\WithPagination;

class [model]Index extends Component
{
    use WithPagination;

    protected $listeners = ['[model-snake]Saved' => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search = '';

    public function render()
{
    $data = [
        'result'   => [model]::when($this->search, function ($query) {
            $query->where('name', 'ilike', '%' . $this->search . '%');
        })->paginate($this->perPage)
        ];

        return view('livewire.[model-name-kebab].[model-name-kebab]-index', $data)->layout('layouts.admin');
    }
}
