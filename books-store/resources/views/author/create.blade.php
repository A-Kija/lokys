<form action="{{ route('author_store') }}" method="post">

Name: <input type="text" name="author_name">
Surname: <input type="text" name="author_surname">


<button type="submit"> New Author </button>

@csrf


</form>