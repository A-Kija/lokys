<form action="{{route('jonas')}}" method="get" style="background:{{$color}}; padding: 20px;">
<input type="text" name="bg">
<button type="submit">Change to color</button>
<a href="{{route('jonas')}}">Clear backgroun</a>
</form>