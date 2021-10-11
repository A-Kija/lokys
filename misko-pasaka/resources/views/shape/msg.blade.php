@if(session('msg_error'))
<div style="color:red;">{{session('msg_error')}}</div>
@endif
@if(session('msg_good'))
<div style="color:green;">{{session('msg_good')}}</div>
@endif