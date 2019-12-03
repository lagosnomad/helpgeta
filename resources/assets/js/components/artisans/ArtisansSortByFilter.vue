<template>
	<div class="field has-addons has-addons-centered is-block-mobile">
		<p class="control">
			<a class="button is-static">
				Sort By:
			</a>
		</p>
		<b-select v-model="selectedFilterModel" name="state_id" expanded @input="onChange" required>
			<option
					v-for="filter in sortFilters"
					:value="filter.value"
					:key="filter.name">
				{{ filter.name }}
			</option>
		</b-select>
	</div>
</template>

<script>
	import CategoriesMixin from "../../utils/CategoriesMixin"
	import {mapGetters} from 'vuex'
    export default {
        name: 'ArtisansSortByFilter',
        mixins: [CategoriesMixin],
        props: ['searchFilters'],
	    data(){
            return {
	            selectedFilterModel: 'rating',
            }
	    },
	    computed: {
		    ...mapGetters(['sortFilters'])
	    },
	    methods: {
            onChange(selectedFilter){
                this.$store.commit('ADD_SEARCH_FILTER',{ name: 'sort', value: selectedFilter, obj: {} });
                this.fetchArtisans();
            },
	    },
	    mounted(){
            this.selectedFilterModel = this.getFilterId('sort');
	    }
    }
</script>

<style lang="scss" scoped>
	@import "~bulma/sass/utilities/mixins";

	.field {
		.control {
			.button.is-static {
				@include mobile {
					width: 100%;
				}
			}
		}
	}
</style>