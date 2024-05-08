<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admindb extends Component
{
    use WithFileUploads;
    public $test = '1';
    public $editdata = 'view';
    public $edifoto = false;
    public $newdata = [];
    public $admin = null;

    public $photo;

    public $oldpass = null;

   

    public function mount()
    {
       
        $this->admin = Account::where('username', session('username'))->first();
        $this->newdata = [
            'name' => $this->admin->name,
            'role' => $this->admin->role,
            'username' => $this->admin->username,
            
        ];
    }

    public function render()
    {
        $data = $this->admin;
        $editdata = $this->editdata;
    

        return view('livewire.admindb', with([
            'editdata' => $editdata,
            'data' => $data,
         

        
        ]));
    }

   

    
}
