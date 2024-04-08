<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\Tag;
use Livewire\Component;
use function Laravel\Prompts\select;

class Home extends Component
{
    public $articles;
    public $tags;

    public function mount($whereTag = null)
    {
        if ($whereTag == null) {
            $this->articles = Article::all();
        } else {
            $where_id_tag = Tag::where('tag_name', '=', $whereTag)->select('article_id')->get();
            foreach ($where_id_tag as $wit) {
                $whereForArticle [] = $wit['article_id'];
            }

            $this->articles = Article::find([$whereForArticle]);

        }


        $this->tags = Tag::all();

    }


    public function render()
    {
        return view('livewire.article.home');
    }
}
