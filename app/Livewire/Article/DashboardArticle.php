<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardArticle extends Component
{public $articlesuser;
    public function mount()
    {
       $this->articlesuser=Article::where('user_id',Auth::user()->id)->get();
//       dd($this->articlesuser);
    }


    public function viewClick($data)
    {

        return $this->redirect("/articles/{$data}");

    }
    public function editClick($data)
    {

        return $this->redirect("/articles/{$data}");

    }

    public function render()
    {
        return view('livewire.article.dashboard-article');
    }
}
