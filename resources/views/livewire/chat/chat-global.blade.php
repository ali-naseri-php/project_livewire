@push('css.link.component')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{asset('css/chat/chat-global.css')}}">
@endpush




    <div class="chat-container">
        <div class="messages">

            @foreach($mesiges as $mesige)

                @if($mesige['user_id']== \Illuminate\Support\Facades\Auth::user()->id)
            <div class="message sender">{{$mesige['mesige']}}</div>
                @else
            <div class="message receiver">{{$mesige['mesige']}}</div>
                @endif
            @endforeach

        </div>
        <div class="input-container">
            <input type="text" wire:model="sms" placeholder="Type your message...">
            <button id="but" wire:click="send">Send</button>
        </div>
    </div>

