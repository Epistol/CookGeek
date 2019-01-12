<template>

    <span :width="getSize + 'px'" @mousemove="mouseMoving" @click="selected"
          style="overflow:visible; padding: 0.1rem">

      <span v-if="getFill === '100%'">
            <img src="/img/rating/muf_full.png" :id="grad" :offset="getFill" alt="Note"
                 :stop-color="(rtl) ? inactiveColor : activeColor" :points="starPointsToString" :fill="getGradId"
                 :stroke="borderColor" :stroke-width="borderWidth" :style="'width:'+getSize+'px'"/>
    </span>
        <span v-else-if="getFill === '50%'">
         <img src="/img/rating/muf_half.png" :id="grad" :offset="getFill" alt="Note 50%"
              :stop-color="(rtl) ? inactiveColor : activeColor" :points="starPointsToString" :fill="getGradId"
              :style="'width:'+getSize+'px'"
              :stroke="borderColor" :stroke-width="borderWidth"/>
    </span>
        <span v-else-if="getFill === '0%'">
         <img src="/img/rating/muf_full.png" :style="'width:'+getSize+'px'" alt="Note vide" class="greyed"/>
    </span>

    </span>
</template>

<script type="text/javascript">
	export default {
		props: {

			fill: {
				type: Number,
				default: 0
			},
			size: {
				type: Number,
				default: 50
			},
			starId: {
				type: Number,
				required: true
			},
			activeColor: {
				type: String,
				required: true
			},
			inactiveColor: {
				type: String,
				required: true
			},
			borderColor: {
				type: String,
				default: '#000'
			},
			borderWidth: {
				type: Number,
				default: 0
			},
			padding: {
				type: Number,
				default: 0
			},
			rtl: {
				type: Boolean,
				default: false
			}
		},
		created() {
			this.calculatePoints;
			this.grad = Math.random().toString(36).substring(7)
		},
		computed: {
			calculatePoints() {
				this.starPoints = this.starPoints.map((point) => {
					return ((this.size / 43) * point) + (this.borderWidth * 1.5)
				})
			},
			starPointsToString() {
				return this.starPoints.join(',')
			},
			getGradId() {
				return 'url(#' + this.grad + ')'
			},
			getSize() {
				return parseInt(this.size) + parseInt(this.borderWidth * 3) + this.padding
			},
			getFill() {
				return (this.rtl) ? 100 - this.fill + '%' : this.fill + '%'
			}
		},
		methods: {
			mouseMoving($event) {
				this.$emit('star-mouse-move', {
					event: $event,
					position: this.getPosition($event),
					id: this.starId
				})
			},
			getPosition($event) {
				// calculate position in percentage.
				var starWidth = (92 / 100) * this.size;
				const offset = (this.rtl) ? Math.min($event.offsetX, 45) : Math.max($event.offsetX, 1);
				var position = Math.round((100 / starWidth) * offset);

				return Math.min(position, 100)
			},
			selected($event) {
				this.$emit('star-selected', {
					id: this.starId,
					position: this.getPosition($event)
				})
			},
		},
		data() {
			return {
				starPoints: [19.8, 2.2, 6.6, 43.56, 39.6, 17.16, 0, 17.16, 33, 43.56],
				grad: '',

			}
		}
	}
</script>
