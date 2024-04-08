<div style="max-width: 400px; margin: auto;">
    <style>
        .error-box {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 100px;
            background-color: #f44336; /* رنگ پس زمینه */
            color: white; /* رنگ متن */
            padding: 15px; /* حاشیه داخلی برای متن */
            text-align: center; /* تراز متن */
            border-radius: 5px; /* گوشه‌های گرد */
            margin: 0 auto; /* مرکز چین */
        }

        #span_help {
            font-size: 10px;
            color: red;
        }

        .delete-button {
            background-color: #ff3333; /* رنگ پس زمینه دکمه */
            color: #fff; /* رنگ متن دکمه */
            border: none; /* حذف حاشیه دکمه */
            padding: 5px 20px; /* فضای داخلی دکمه */
            border-radius: 5px; /* شکل گرد دکمه */
            cursor: pointer; /* نشانگر ماوس به شکل دست دادن */
            transition: background-color 0.3s ease; /* انیمیشن تغییر رنگ پس زمینه */
        }

        .delete-button:hover {
            background-color: #cc0000; /* رنگ پس زمینه هنگام نگه داشتن ماوس روی دکمه */
        }

        .delete-button:focus {
            outline: none; /* حذف حاشیه فوکوس بر دکمه */
        }
    </style>



    <!-- Name -->

    <div><br><br>

        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                      wire:model.live="name"/>
        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
    </div>

    <div>
        <label for="newTag">tag</label>
        @if(! $tags)
            <span id="span_help"><br>for save tag enter and for delete tag on Wrote click </span>
        @endif
        <input id="newTag" class="block mt-1 w-full" type="text" name="newTag"
               wire:model="newTag" wire:keydown.enter="addTag"/>
        <x-input-error :messages="$errors->get('newTag')" class="mt-2"/>
    </div>

    @foreach((array)$tags as  $tag)
        <span>#{{$tag}} </span>

    @endforeach
    @if($tags)
        <br>
        <button class="delete-button" type="button" wire:click="deleteTags">delete tags</button>

    @endif

{{--    <!-- Email Address -->--}}
    <div class="mt-4">
        <label for="body">Body</label>

        <textarea id="body" class="block mt-1 w-full"    wire:model.live="body"></textarea>

    </div>

    <!-- Password -->
    <div class="mt-4">
        <label for="png">png</label>
        <input id="photo" class="block mt-1 w-full" type="file" wire:model.live="image"/>

    </div>

    <!-- Confirm Password -->


    <div class="flex items-center justify-end mt-4">
        <br>
        <br>
        @if($saveStatos)
        <div class="error-box" id="successMessage">

            <p>Error :Please wait a few seconds after taking the picture, then hit save !!!</p>
        </div> <br>@endif

        <x-primary-button wire:click="save" class="ms-4">
            {{ __('save') }}
        </x-primary-button>
    </div>

</div>
