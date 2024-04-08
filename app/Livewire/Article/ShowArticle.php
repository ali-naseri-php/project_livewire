<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\Tag;
use Livewire\Component;

class ShowArticle extends Component

{public $tags;
    public $article;
public function mount(Article $article)
{
//    dd($article);
    $this->$article=$article;
    $this->tags=Tag::where('article_id',$article->id)->get();



}
    public function render()
    {
        return view('livewire.article.show-article');
    }
}
