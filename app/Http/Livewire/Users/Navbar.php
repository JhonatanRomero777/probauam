<?php

namespace App\Http\Livewire\Users;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public String $namePage;

    public function mount($namePage)
    {
        $this->namePage = $namePage;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.users.navbar');
    }
}