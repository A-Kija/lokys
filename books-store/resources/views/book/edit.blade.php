<form action="{{ route('book_update', $book) }}" method="post">

title: <input type="text" name="book_title" value="{{$book->title}}">
ISBN: <input type="text" name="book_isbn" value="{{$book->isbn}}">
pages: <input type="text" name="book_pages" value="{{$book->pages}}">
about: <textarea name="book_about">{{$book->about}}</textarea>

<button type="submit"> Edit Book </button>

@csrf


</form>