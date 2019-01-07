<section class="bordered-cdg">
            <div class="tags">
                @foreach($univers as $univer)

                    <span class="tag">
                                <a href="{{route('univers.show', $univer->id)}}" class="">{!! $univer->name !!}</a>
                    </span>
                @endforeach
            </div>
</section>
