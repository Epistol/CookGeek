<template>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select required name="difficulty" id="difficulty">
                    <option disabled value="">Category</option>
                    <option v-for="(item, index) in this.category" value="{{index}}">
                        {{item}}
                    </option>
                </select>
            </div>

            <div class="lecout">
                <p>Coût de réalisation</p>
                <fieldset class="rating">

                    @for($i = 3; $i >= 1;$i--)
                    @if(old('cost') == $i)
                    @if(Route::is('*.create'))
                    <input type="radio" selected="cost" id="{{$i}}"
                           value="{{$i}}" name="cost"/>
                    @else
                    <input type="radio" selected="cost" id="{{$i}}"
                           {{ $i === $recette->cost ? "checked":"" }}
                    value="{{$i}}" name="cost"/>
                    @endif

                    @else
                    <input type="radio" id="{{$i}}" value="{{$i}}" name="cost"/>
                    @endif

                    <label class="cost button" for="{{$i}}">
                        <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                    </label>
                    @endfor
                </fieldset>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "SetCost",
        data: function () {
            return {
                categories: '',
            };
        },
        methods: {
            getCategoryList() {
                axios.get('/api/category/').then(response => {
                    this.categories = response.data;
                });
            }
        },
        mounted() {
            this.getCategoryList();
        },
    }
</script>
