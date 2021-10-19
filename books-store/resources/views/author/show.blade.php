
name: <div>{{$author->name}}</div>
surname: <div>{{$author->surname}}</div>

<h4>Books by author</h4>
<ul>
@foreach ($author->getBooks as $book)
    <li>{{$book->title}}</li>
@endforeach
</ul>

