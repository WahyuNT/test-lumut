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
       
        $this->admin = Account::where('id', session('admin_id'))->first();
        $this->newdata = [
            'nama_lengkap' => $this->admin->nama_lengkap,
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

    public function editdataTrue()
    {
     
        $this->editdata = 'editdata';
      
    }
    public function editdatapassword()
    {
     
        $this->editdata = 'password';
      
    }
    public function editDataFalse()
    {
        $this->editdata = 'view';
    }
    public function editfoto()
    {
        $this->editdata = 'editfoto';
    }

    public function nullAll()
    {
        $this->oldpass = null;
        $this->newdata['newpassword'] = null;
        $this->newdata['newpassword_confirmation'] = null;
    }
    public function back()
    {
     
        $this->editdata = 'view';
        $this->nullAll();
        $this->newdata = [
            'nama_lengkap' => $this->admin->nama_lengkap,
            'username' => $this->admin->username,
            
        ];
      
    }

    public function savedata()
    {
       

        $this->admin->nama_lengkap = $this->newdata['nama_lengkap'];
        $this->admin->username = $this->newdata['username'];
        $this->admin->save();
        session()->flash('success', 'Data berhasil disimpan.');
     
        $this->editDataFalse();
        $this->nullAll();
    }

    public function checkOldPass() {

      
        if ($this->admin->password == $this->oldpass) {
            $this->editdata = 'changepassword';
            $this->nullAll();
        }else{
            session()->flash('error', 'Password lama salah.');
        }
        
    }

    public function saveNewPassword()
    {
      
        $this->validate([
            'newdata.newpassword' => 'required|min:6',
            'newdata.newpassword_confirmation' => 'required|same:newdata.newpassword',
        ]);

        $this->admin->password = $this->newdata['newpassword'];
        $this->admin->save();

        session()->flash('success', 'Password berhasil diubah.');

        $this->editDataFalse();
        $this->nullAll();
    }

    
}
