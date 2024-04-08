<?php

namespace App\Livewire\Article;

use App\Events\FileUploaded;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewArticle extends Component

{
    use WithFileUploads;

//    #[Validate('min:2|max:255|required')]
    public $name;
    public $image;
    public $saveStatos;


    public $newTag;
    public $tags = [];

    public $body;

    public function save()
    {
        if (!$this->image) {
            return $this->saveStatos = 'tel: ali_naseri_php';
        }

        $namefile = time() . '.' . $this->image->getClientOriginalExtension();
        $post = $this->image->storeAs(path: 'public', name: $namefile);
        event(new FileUploaded($namefile));
        $article = new Article();
        $article->body = $this->body;
        $article->image = 'images_post/' . $namefile;
        $article->title = $this->name;
        $article->user_id = Auth::user()->id;
        $article->save();
        foreach ($this->tags as $t) {
            $tag = new Tag();
            $tag->tag_name = $t;
            $tag->article_id = $article->id;
            $tag->save();
        }
        $this->reset();


    }

    public function addTag()
    {

        $this->tags[] = $this->newTag;
        $this->reset('newTag');

    }

    public function deleteTags()
    {
        $this->tags = [];
    }

    public function render()
    {
        return view('livewire.article.new-article');
    }
}
