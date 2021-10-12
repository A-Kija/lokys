<ul>
@foreach ($books as $book)
  <li>{{$book->title}} {{$book->isbn}} {{$book->pages}}</li>  
@endforeach
</ul>