{{-- <ul>
@foreach ($books as $book)
  <li>{{$book->title}} {{$book->isbn}} {{$book->pages}}</li>  
@endforeach
</ul> --}}



@foreach ($books->chunk(3) as $chunk)
    <div>
        @foreach ($chunk as $book)
            <span>
            {{$book->title}} {{$book->isbn}} {{$book->pages}}
            <a href="{{route('book_edit', $book)}}">REDAGUOTI</a>
            </span>
        @endforeach
    </div>
@endforeach