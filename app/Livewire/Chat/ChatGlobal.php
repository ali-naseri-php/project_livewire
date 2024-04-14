<?php

namespace App\Livewire\Chat;

use App\Models\Article;
use App\Models\Mesige;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatGlobal extends Component
{
    public $mesiges = [];
    public $sms;
    public $masagewhere;

    public function mount($masagewhere = null)
    {
//        dd(Auth::user()->id);
        $this->masagewhere = $masagewhere;
        if ($this->masagewhere == null) {
            $allmes = Mesige::where('interface', '=', 'chat')->orderBy('created_at', 'desc')->select('mesige', 'user_id')->get();
            foreach ($allmes as $mes) {

//                dd($mes);
                $this->mesiges [] = ['mesige'=>$mes['mesige'],'user_id'=>$mes['user_id']];
            }
        } else {
            $allmes = Mesige::where('interface', '=', $this->masagewhere)->orderBy('created_at', 'desc')->select('mesige', 'user_id')->get();
            foreach ($allmes as $mes) {
                $this->mesiges [] = ['mesige'=>$mes['mesige'],'user_id'=>$mes['user_id']];
            }
        }
//        dd($this->mesiges );


    }

    public function send()
    {
        $mes = new Mesige();
        $mes->mesige=$this->sms;
        $mes->interface = $this->masagewhere ? $this->masagewhere : 'chat';
        $mes->user_id=Auth::user()->id;
        $mes->save();
        $this->sms='';
        $this->mesiges=[];
        $this->mount($this->masagewhere);

    }

    public function render()
    {
        return view('livewire.chat.chat-global');
    }
}
