<template>
	<div class="widget">
		<h4 class="widget-title">Price</h4>
		<div class="widget-content">
			<div class="field has-addons">
				<p class="control">
					<input class="input" type="number" placeholder="₦" v-model.number="priceMin">
				</p>
				<p class="control">
					<a href="#" class="button is-static"> to </a>
				</p>
				<p class="control">
					<input class="input" type="number" placeholder="₦" v-model.number="priceMax">
				</p>
				<p class="control">
					<a class="button is-light" @click.prevent="addPriceFilter">
						<span class="icon fa fa-chevron-right"></span>
					</a>
				</p>
			</div>
		</div>
	</div>
</template>

<script>
    import CategoriesMixin from "../../utils/CategoriesMixin"
    export default {
        name: 'CategoriesSidebarPriceWidget',
        mixins: [CategoriesMixin],
	    data(){
            return {
                priceMin: '',
	            priceMax: ''
            }
	    },
	    methods: {
            addPriceFilter(){

                if(this.priceMin)
                    this.$store.commit('ADD_SEARCH_FILTER',{ name: 'price_min', value: this.priceMin, obj: {} });
                else
                    this.$store.commit('REMOVE_SEARCH_FILTER_BY_KEY','price_min');

                if(this.priceMax)
                    this.$store.commit('ADD_SEARCH_FILTER',{ name: 'price_max', value: this.priceMax, obj: {} });
                else
                    this.$store.commit('REMOVE_SEARCH_FILTER_BY_KEY','price_max');

                if(this.priceMin || this.priceMax)
                    this.fetchArtisans();
            }
	    }
    }
</script>