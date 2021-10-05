@forelse ($colors as $color)
<span style="display:inline-block;width:100px;height:100px;margin:10px;background:{{$color}};"></span>
@empty
<h3 style="color:red">Kvadratų nėra ir nebus!</h3>
@endforelse


    

    
