@auth
@if(Auth::user()->avatarUser!== 'users/default.png')
    <img src="{{Auth::user()->avatarUser}}" style="max-height:196px;">
@else
    <img src="https://api.adorable.io/avatars/64/{{Auth::user()->name}}">
@endif
    @else
@endauth