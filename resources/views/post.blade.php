<x-layout>
    <article>
        <h1>{{$post->title}}</h1>
        <p>{{$post->date}}</p>
        <div>
            {!! $post->body !!}
        </div>
        <p><a href="/">Home</a></p>
    </article>
</x-layout>