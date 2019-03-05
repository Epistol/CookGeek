@if(Auth::user()->avatar !== 'users/default.png')
    <img src="/user/{{Auth::user()->id}}/{{Auth::user()->avatar}}" style="max-height:196px;">
@else
    <img src="https://api.adorable.io/avatars/64/{!! Auth::user()->name !!}">
@endif