<template>
    <div >
        <input
            type="text"
            v-model="searchquery"
            @input="autoComplete"
            class="input_modal blck"
            @keydown.down="onArrowDown"
            @keydown.up="onArrowUp"
            @keydown.enter="onEnter"
            :name="searchtype"
        />
        <ul class="autocomplete-results" v-show="isOpen">
            <li :key="i"  :class="{ 'is-active': i === arrowCounter }" class="autocomplete-result" @click="setResult(result.name)" v-for="(result,i) in data_results">
                {{ result.name }}
            </li>
            <li v-show="data_results.length === 0">
                Pas de résultats
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'autocomplete',
        props: ['searchtype'],
        data: function () {
            return {
                searchquery: '',
                data_results: [],
                isOpen: false,
                arrowCounter: -1
            }
        },
        mounted() {
            console.log(this.searchtype);
        },
        methods: {
            autoComplete(){
                this.isOpen = true;
                this.data_results = [];
                let that = this;
                if(this.searchquery.length > 2){
                    axios.get('/api/autocomplete/search/'+that.searchtype+'/' ,{params: {searchquery: this.searchquery}}).then(response => {
                        // console.log(response);
                        this.data_results = response.data;
                    });
                }
            },
            setResult(result) {
                this.searchquery = result;
                this.isOpen = false;
            },
            onArrowDown() {
                if (this.arrowCounter < this.data_results.length) {
                    this.arrowCounter = this.arrowCounter + 1;
                }
            },
            onArrowUp() {
                if (this.arrowCounter > 0) {
                    this.arrowCounter = this.arrowCounter - 1;
                }
            },
            onEnter() {
                var result =  this.data_results[this.arrowCounter];
                this.searchquery = result.name;
                this.isOpen = false;
                this.arrowCounter = -1;
            },

        },
    };
</script>

