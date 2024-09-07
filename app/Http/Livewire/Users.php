<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        if (empty($this->search))
            $users = User::paginate(15);
        else {
            $users = User::where('username', 'LIKE', "%$this->search%")
                ->orWhere('email', 'LIKE', "%$this->search%")
                ->paginate(15);
        }

        return view('livewire.users', compact('users'));
    }
}
