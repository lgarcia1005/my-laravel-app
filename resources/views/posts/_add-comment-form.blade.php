<form class="space-y-6 border border-gray-200 p-6 rounded-xl" action="/posts/{{ $post->slug }}/comments" method="POST">
    @csrf

    <header class="flex items-center">

        <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" alt="" width="40" height="40" class="rounded-full">


        <h2 class="ml-3">Want to Participate?</h2>
    </header>

    <div>
        <label for="body" class="block text-sm font-medium leading-6 text-gray-900"></label>
        <div class="mt-2">
                                <textarea id="body"
                                          name="body"
                                          cols="30"
                                          rows="5"
                                          placeholder="Quick, think of something to say!"
                                          class="w-full border border-gray-200 placeholder-black-100 rounded-xl p-3 focus:outline-none focus:ring"></textarea>
        </div>
    </div>

    <div>
        <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Post a Comment
        </button>
    </div>

    @if( $errors->any() )
        <ul class="" role="alert">
            @foreach($errors->all() as $error)
                <li class="text-red-600 text-xs list-disc"> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
</form>
