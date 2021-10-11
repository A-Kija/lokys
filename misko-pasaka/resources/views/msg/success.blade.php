@if($msg = session('msg_success'))
<div style="background:green;padding:10px;margin:30px;text-align:center">
    {{$msg}}
</div>
@endif
