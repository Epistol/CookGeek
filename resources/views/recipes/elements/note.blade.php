@if($recipe->note)
    <star-rating :rating="{{intval($recipe->note->avg('note')) || 1}}" :increment="0.5" :star-size="20"
                 :recipeid="{{$recipe->id}}"></star-rating>
@else
    <star-rating :rating="0" :increment="0.5" :star-size="20"
                 :recipeid="{{$recipe->id}}"></star-rating>
@endif