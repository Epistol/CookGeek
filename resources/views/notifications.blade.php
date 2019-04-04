@if(!empty($status))
    @if ($status)
        <Notif title="is-alert" v-if="seen" @close="seen = false" content="{{$status}}">
        </Notif>
    @endif
@endif