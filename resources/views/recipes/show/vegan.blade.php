@if($recipe->vegetarien)
    @if($recipe->vegetarien == 1)
        <div class="side-bg">

            <div class="field vegan is-horizontal">
                <div class="" style="width: 100%;">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label for="switchNormal"> <i class="fas fa-leaf" aria-hidden="true"
                                                              style="color:#7FC6A4"></i> Végétarienne</label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endif
@endif