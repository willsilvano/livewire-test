<?php

namespace App\Http\Livewire\Admin;

use App\Person;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Persons extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $columns = ['id', 'name', 'email'];
    public $sortFieldsOrder = [
        'id' => 'asc',
        'name' => 'asc',
        'email' => 'asc',
    ];
    public $currentLimit = 10;
    public $limitOptions = [10, 50, 100];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingOrder($sortField, $order)
    {
        $this->sortField = $sortField;

        if (!in_array($sortField, $this->columns)) {
            $this->sortField = 'name';
        }

        $this->sortFieldsOrder[$sortField] = $order == 'asc' ? 'desc' : 'asc';

        $this->resetPage();
    }

    public function updatedCurrentLimit($value)
    {
        if (!in_array($value, $this->limitOptions)) {
            $this->currentLimit = 10;
        }
    }

    public function remove($id)
    {
        Person::find($id)->delete();
    }

    public function render()
    {
        $persons = Person::where('name', 'ilike', '%' . $this->search . '%')
            ->orWhere('email', 'ilike', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortFieldsOrder[$this->sortField])
            ->paginate($this->currentLimit);

        return view('livewire.admin.persons', [
            'persons' => $persons,
        ]);
    }
}
