<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $users;

    public User $user;

    private $password;

    protected $rules = [
        'user.email' => 'required|email',
        'user.a_password' => 'required|min:7'
    ];

    protected $messages = [
        'user.email.required' => 'El campo es obligatorio',
        'user.email.email' => 'Extensión de correo no válida',
        'user.a_password.required' => 'El campo es obligatorio',
        'user.a_password.min' => 'Contraseña mínima de 7 carácteres'
    ];

    protected $listeners = ['goHome'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->users = User::all();
        $this->user = new User;
    }

    public function login()
    {

        $credentials = $this->validate();

        $this->password = $this->user->a_password;
        $this->user->a_password = hash('sha512',$this->user->a_password);

        foreach($this->users as $current_user)
        {
            if($current_user->email == $this->user->email && $current_user->password == $this->user->a_password)
            { $this->user = $current_user; $this->dispatchBrowserEvent('welcome'); }
        }

        //$this->dispatchBrowserEvent('error',['text'=>'Correo o Contraseña Incorrecta. Por favor intente denuevo']);
        //$this->user->a_password = $this->password;

        // dd(Auth::attempt($credentials));
    }

    public function goHome()
    {
        Auth::login($this->user);
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.users.login');
    }
}