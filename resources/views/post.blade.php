<x-layout.master>
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        <p>
           by: <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
        <p>
            {!! $post->body !!}
        </p>
    </article>
    <a href="/">Back</a>
</x-layout.master>
