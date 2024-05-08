<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;

class DataAccount extends Component
{
    public $search = '';
    public $edit = '';

    public function render()
    {
        $data = Account::where('name', 'like', '%'.$this->search.'%' )
        ->when($this->search, function($query){
            $query->where('username', 'like', '%'.$this->search.'%')
            ->orWhere('name', 'like', '%'.$this->search.'%')
            ->orWhere('role', 'like', '%'.$this->search.'%');
        })
      
       ->get();

       $username = $this->edit;
        return view('livewire.data-account' , with([
            'data' => $data,
            'username' => $username
        ]));
    }

    public function editData($username)
    {
        $this->edit = $username;
    }

}
