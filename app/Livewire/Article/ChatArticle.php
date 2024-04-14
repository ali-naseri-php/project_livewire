<?php

namespace App\Livewire\Article;

use App\Models\Mesige;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatArticle extends Component
{
    public $msg;
    public $idArticle;

    public $commants = [];

    public function mount($idArticle)
    {

        $this->idArticle = $idArticle;

        $this->commants= Mesige::where('interface', '=', $idArticle)->get();



    }

    public function submit()
    {
        $msg = new Mesige();
        $msg->interface = $this->idArticle;
        $msg->mesige = $this->msg;
        $msg->user_id = Auth::user()->id;
        $msg->save();
        $this->reset(['msg','commants']);
        $this->mount($this->idArticle);


    }

    public function render()
    {
        return view('livewire.article.chat-article');
    }
}
