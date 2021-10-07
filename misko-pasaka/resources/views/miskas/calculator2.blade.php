<form action="{{route('c2')}}" method="get" style="padding: 20px;">
    <input type="text" name="var1" value="{{$var1}}">
    <select name="action">
        <option value="sum" @if('sum'==$action) selected @endif>+</option>
        <option value="diff" @if('diff'==$action) selected @endif>-</option>
        <option value="mult" @if('mult'==$action) selected @endif>*</option>
        <option value="div" @if('div'==$action) selected @endif>/</option>
    </select>
    <input type="text" name="var2" value="{{$var2}}">
    <button type="submit">Calculate</button>
    <a href="{{route('c2')}}">Reset</a>
</form>

@if($result)
<h2 style="color:pink; padding: 5px; border:1px solid pink; display:inline-block;">
    {{$result}}
</h2>
@endif
