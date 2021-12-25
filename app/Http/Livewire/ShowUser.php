<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Transaction;

class ShowUser extends Component
{
    public $Users;

    public function mount()
    {
        $Users = User::whereIs_admin(0)->withCount('transactions')->paginate(4);
        //$this->user = User::find($id);
    }

    // public function delete()
    // {
    //     $this->post->delete();
    // }
    public function showUser($id){
        $this->user =  User::find($id);
        //$this->emit('newPost', $post->id);
    }
    public function render()
    {
        return view('livewire.show-user');
    }
}
