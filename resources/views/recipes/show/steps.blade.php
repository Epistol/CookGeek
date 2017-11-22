@forelse($steps as $step)
    <div class="step">
        <div class="columns">
            <div class="column is-1">
            <span class="step">
                {{$step->step_number+1}}
            </span>

            </div>
            <div class="column">
                <div class="content">
                    <p>   {{$step->instruction}}</p>
                </div>
            </div>
        </div>
    </div>


@empty
@endforelse