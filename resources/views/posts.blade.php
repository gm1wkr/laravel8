<x-layout>
    @foreach ($posts as $post)
    <article>
        <h1><a href="/post/{{{$post->slug}}}">{{$post->title}}</a></h1>
        <p>{{$post->date}}</p>
        <div>
            {{$post->excerpt}}
        </div>
    </article>
    @endforeach
</x-layout>
