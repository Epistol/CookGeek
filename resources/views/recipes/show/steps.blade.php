<div class="columns">
    <div class="column is-three-quarters">
        <h2 class="title">Les étapes</h2>
    </div>
    <div class="column">

        <div class="field has-addons">
            <p class="control">
                <a class="button">
                  <span class="icon is-small">
                    <i class="material-icons">&#xE87E;</i>
                  </span>
                </a>
            </p>
            <p class="control">
                <a class="button">
                  <span class="icon is-small">
                   <i class="material-icons">&#xE8AD;</i>
                  </span>
                </a>
            </p>
            <p class="control">
                <a class="button">
                  <span class="icon is-small">
                    <i class="material-icons">&#xE80D;</i>
                  </span>
                </a>
            </p>
        </div>




    </div>
</div>


@forelse($steps as $step)
    <div class="step">
        <div class="columns">
            <div class="column is-1 is-flex-center">
            <span class="step">
                {{$step->step_number+1}}
            </span>

            </div>
            <div class="column is-lateral " style="display:flex;align-items:center;">
                <div class="content">
                    <p>   {{ucfirst($step->instruction)}}</p>
                </div>
            </div>
        </div>
    </div>


@empty
@endforelse