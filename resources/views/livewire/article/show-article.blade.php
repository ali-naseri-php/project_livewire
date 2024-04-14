@push('css.link.component')
    <link rel="stylesheet" href="{{asset('css/article/show-article.css')}}">
@endpush
<div>
    <div class="article-container">
        <div class="image-container">
            <img src="{{url($article->image)}}" >
        </div>
        <div class="content">
            <h1>{{$article->title}}</h1>
            @foreach($tags as $tag)
            <div class="button-group">
                <a href="{{url("/$tag->tag_name")}}"><button type="button">#{{$tag->tag_name}}</button>
                </a>
            </div>

            @endforeach
            <div class="article-body">
                <p>{{$article->body}}</p>
            </div>
        </div>
    </div>
<livewire:Article.chat-article idArticle="{{$article->id}}"/>


</div>
