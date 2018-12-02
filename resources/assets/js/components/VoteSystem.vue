<template v-cloak>

    <!--TODO FINISH-->
    <div class="content rating">


        @for($i = 0; $i < $starsget[0]; $i++)
        <span class="star">
                        <img src="{{url("/img/rating/muf_full.png")}}"/>
                        </span>
        @php $count++ @endphp
        @endfor

        @if($starsget[1] >= 5)
        <span class="star">
                <img src="{{url("/img/rating/muf_half.png")}}"/>
                </span>
        @php $count++ @endphp
        @endif

        @if(!isset($starsget[0]) or $starsget[0] == NULL OR $starsget[0] == 0 )

        @php $count = 5 @endphp


        @endif

        @for($i = $count; $i > $starsget[0]; $i--)
        <span class="star">
                <img class="greyed" src="{{url("/img/rating/muf_full.png")}}"/>
                </span>
        @endfor


    </div>

    <!--
   <div>
       <a class="tag like" :class="{ 'liked': retour !== false }" @click="toggleLike(recipeid)"  ><i class="material-icons">favorite</i></a>
   </div>-->
</template>

<script>
	export default {
		props : ["recipeid", "userid"],
		data: function () {
			return {
				counter: 0,
                retour : '',

			};
		},

		methods: {
			async toggleLike() {
				if(this.userid){
					axios.post('/api/like/toggle_like/', {recipeid :  this.recipeid, userid: this.userid } ).then(response => {
						this.retour = response.data;
					});
				}
				else {
					console.log("pas connecté");
					// this.notoggle();
					this.retour = false;

				}

			},
			async is_already_liked(){
				if(this.userid){
					axios.post('/api/like/check_liked/', {recipeid :  this.recipeid, userid: this.userid } ).then(response => {
						this.retour = response.data;
					});
                }
                else {
					this.retour = false;
                }
			},
		},
		mounted() {
			this.is_already_liked();
		},

		computed: {
			countminus: function(){
				return this.counter - 1 ;
			},

		},

	}
</script>
