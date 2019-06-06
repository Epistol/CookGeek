@if(Auth::user()->img!== 'users/default.png')
    <img src="/user/{{Auth::user()->id}}/{{Auth::user()->img}}" style="max-height:196px;">
@else
    <img src="https://api.adorable.io/avatars/64/{{Auth::user()->name}}">
@endif