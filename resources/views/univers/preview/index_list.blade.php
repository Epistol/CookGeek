<section class="bordered-cdg">
            <div class="tags">
                @foreach($univers as $univer)
                    @if(strip_tags($univer->name))
                    <span class="tag">
                                <a href="{{route('univers.show', $univer->name)}}" class="">{{ strip_tags(strip_tags($univer->name))}}</a>
                    </span>
                    @endif
                @endforeach
            </div>
</section>
