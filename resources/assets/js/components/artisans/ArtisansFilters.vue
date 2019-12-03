<template>
	<div class="field is-grouped is-grouped-multiline" v-if="searchFilters.length">
		<div v-for="filter in searchFilters" v-if="checkifPricingMinMaxExists(filter)" class="control">
			<div class="tags has-addons">
				<span class="tag is-light is-medium is-hidden-mobile">{{getFilterName(filter)}}</span>
				<span class="tag is-light is-hidden-tablet">{{getFilterName(filter)}}</span>
				<a @click.prevent="removeFilter(filter)" class="tag is-delete is-medium is-hidden-mobile"></a>
				<a @click.prevent="removeFilter(filter)" class="tag is-delete is-hidden-tablet"></a>
			</div>
		</div>
	</div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import CategoriesMixin from "../../utils/CategoriesMixin"
    export default {
        name: 'ArtisansFilters',
        mixins: [CategoriesMixin],
	    data(){
            return {

            }
	    },
	    computed: {
		    ...mapGetters([
		        'sortFilters','searchFilters'
		    ])
	    },
	    methods: {
            removeFilter(filter){
                this.$store.commit('REMOVE_SEARCH_FILTER',filter);
                this.fetchArtisans();
            },
            checkifPricingMinMaxExists(filter){
                if(filter.name === 'price_min'){
                    let price_max = this.searchFilters.find(item => item.name === 'price_max');
                    return _.isEmpty(price_max);
                }
                return true;
            },
            getFilterName(filter){
                let value;
                let pricing = false;
                switch(filter.name) {
                    case 'sort':
                        let rating = this.sortFilters.find(item => item.value === filter.value);
                        value = rating.name;
                        break;
	                case 'rating_min':
	                    value = filter.value+' stars and higher';
	                    break;
                    case 'price_min':
	                    value = 'At least '+this.$options.filters.currency(filter.value);
                        break;
                    case 'price_max':
                        let price_min = this.searchFilters.find(item => item.name === 'price_min');
                        if(!_.isEmpty(price_min)) pricing = true;
                        else value = 'At most '+this.$options.filters.currency(filter.value);
                        break;
                    default:
                        value = filter.value;
                }
                if(pricing){
                    let price_max = this.searchFilters.find(item => item.name === 'price_max');
                    let price_min = this.searchFilters.find(item => item.name === 'price_min');
	                return this.$options.filters.currency(price_min.value)+' - '+this.$options.filters.currency(price_max.value);
                }
                return value;
            },
	    }
    }
</script>