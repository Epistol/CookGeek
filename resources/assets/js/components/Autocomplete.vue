<template>
    <div>
        <input
                type="text"
                v-model="searchquery"
                @input="autoComplete"
                class="input_modal blck"
                @keydown.down="onArrowDown"
                @keydown.up="onArrowUp"
                @keydown.enter="onEnter"
                @focus="isOpen = true"
                :name="searchtype"
                :placeholder="data_old"
        />
        <ul class="autocomplete-results" v-show="isOpen && this.search_more === false">
            <li :key="i" :class="{ 'is-active': i === arrowCounter }"
                class="autocomplete-result" v-for="(result,i) in data_results">
                <span @click="setResult(result.name)" class="test">{{ result.name }}</span>
            </li>
            <li v-show="data_results.length === 0 && this.search_more === true" class="autocomplete-result">
                Pas de résultats
            </li>

        </ul>
    </div>
</template>

<script>
    export default {
        name: 'searchautocomplete',
        props: ['searchtype', 'data_old'],
        data: function () {
            return {
                searchquery: '',
                data_results: [],
                isOpen: false,
                arrowCounter: -1,
                search_more: true,
            }
        },
        methods: {
            autoComplete() {
                this.isOpen = true;
                this.data_results = [];
                let that = this;
                if (this.searchquery.length > 2) {
                    axios.get('/api/autocomplete/search/univers', {params: {searchquery: this.searchquery}}).then(
                        response => {
                            console.log(response);
                            this.data_results = response.data;
                        });
                    this.search_more = false;
                } else {
                    this.search_more = true;
                }
            },
            setResult(nom) {
                this.isOpen = true;
                this.searchquery = nom;
                console.log(nom);
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
                var result = this.data_results[this.arrowCounter];
                this.searchquery = result.name;
                this.isOpen = false;
                this.arrowCounter = -1;
            },

            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.isOpen = false;
                    this.arrowCounter = -1;
                }
            },

        },

        mounted() {
            this.searchquery = this.data_old;
        },
        destroyed() {
            // document.removeEventListener('click', this.handleClickOutside);
        }


    };
</script>

