@foreach ($authors->chunk(3) as $chunk)
    <div>
        @foreach ($chunk as $author)
            <span>
            {{$author->name}} {{$author->surname}} <b>Books: {{$author->getBooks->count()}}</b>
            <a href="{{route('author_edit', $author)}}">REDAGUOTI</a>
            <a href="{{route('author_show', $author)}}">DAUGIAU</a>
            <form action="{{route('author_delete', $author)}}" method="post">
                <button type="submit">TRINTI</button>
                @method('DELETE')
                @csrf
            </form>
            </span>
        @endforeach
    </div>
@endforeach