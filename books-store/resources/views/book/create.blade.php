<form action="{{ route('book_store') }}" method="post">

title: <input type="text" name="book_title">
ISBN: <input type="text" name="book_isbn">
pages: <input type="text" name="book_pages">
about: <textarea name="book_about"></textarea>

<button type="submit"> New Book </button>

@csrf


</form>