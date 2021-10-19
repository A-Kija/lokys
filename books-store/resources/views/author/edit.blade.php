<form action="{{ route('author_update', $author) }}" method="post">

name: <input type="text" name="author_name" value="{{$author->name}}">
surname: <input type="text" name="author_surname" value="{{$author->surname}}">

<button type="submit"> Edit Author </button>

@method('PUT')
@csrf


</form>