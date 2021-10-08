<form action="{{route('do_calc_form')}}" method="post" style="padding: 20px;">
    <input type="text" name="var1" value="">
    <select name="action">
        <option value="sum">+</option>
        <option value="diff">-</option>
        <option value="mult">*</option>
        <option value="div">/</option>
    </select>
    <input type="text" name="var2" value="">
    <button type="submit">Calculate</button>
    {{-- <a href="{{route('c2')}}">Reset</a> --}}
    @csrf
</form>

@if($result)
<h2 style="color:pink; padding: 5px; border:1px solid pink; display:inline-block;">
    {{$result}}
</h2>
@endif



