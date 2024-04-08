@push('css.link.component')
    <link rel="stylesheet" href="{{asset('css/article/home.css')}}">
@endpush
<div>
    <a href="{{url('/articles/new')}}"><i style="font-size: 30px">add new article</i></a>


    <section class="cards-wrapper">
        @foreach($articles as $article)


            <div class="card-grid-space " >
                <div class="num">{{$article->id}}</div>

                <a class="card" href="{{url("/articles/$article->id")}}" >
                    <div >

                        <h1>{{$article->title}}</h1>
                        <br>
                        <br>

                        <div class="date">{{$article->created_at}}</div>
                        @foreach($tags as $tag)
                            @if($tag->article_id==$article->id)
                                <div class="tags">
                                    <div class="tag">{{$tag->tag_name}}</div>

                                </div>

                            @endif
                        @endforeach
                    </div>
                </a>
            </div>
        @endforeach
        <!-- https://images.unsplash.com/photo-1520839090488-4a6c211e2f94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=38951b8650067840307cba514b554ba5&auto=format&fit=crop&w=1350&q=80 -->
    </section>
</div>
