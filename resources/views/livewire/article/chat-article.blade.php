@push('css.link.component')
    <link rel="stylesheet" href="{{asset('css/article/chat-article.css')}}">
@endpush<div>

    <div class="container">
        <h2>Leave a Comment</h2>

            <textarea id="commentText"wire:model.live="msg" placeholder="comment here..."></textarea>
            <button id="button" wire:click="submit" type="submit">Submit</button>


        <div id="comments">
            @foreach( $commants as $commant )

                        <!-- Comments will be displayed here -->
                <div class="comment">
                    <div class="comment-header">
                        <h3 class="comment-author">{{$commant->user()->first()->name}}</h3>
                        <span class="comment-date">{{$commant->updated_at}}</span>
                    </div>
                    <p class="comment-text">{{$commant->mesige}}</p>
                </div>
            @endforeach
        </div>
    </div>

</div>
