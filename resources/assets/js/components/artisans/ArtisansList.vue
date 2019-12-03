<template>
	<div class="categories-artisan-section">
		<div class="sub-category-heading has-padding-bl-5 has-margin-b-4 has-border-bottom" v-if="!checkBaseCategorySameAsItem">
			<h2 class="title is-4">{{category.category}}</h2>
		</div>
		<div class="sub-category-filter has-border-bottom has-padding-b-4 has-padding-l-5">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<artisans-location-search :searchFilters="searchFilters"></artisans-location-search>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<artisans-sort-by-filter :searchFilters="searchFilters"></artisans-sort-by-filter>
					</div>
				</div>
			</div>
		</div>
		<div class="sub-category-filter-result has-border-bottom has-padding-blt-5">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<p class="subtitle is-6"><span class="has-text-primary has-text-weight-bold">{{artisans.length}}</span>
							Service Provider(s)</p>
					</div>
					<div class="level-item">
						<artisans-filters></artisans-filters>
					</div>
				</div>
			</div>
		</div>
		<div id="artisan-listings" class="list-view" style="position: relative">
			<template v-for="artisan in artisans">
				<artisans-list-item :artisan="artisan" :key="artisan.id"></artisans-list-item>
			</template>

		</div>
	</div>
</template>

<script>
	import ArtisansLocationSearch from './ArtisansLocationSearch';
	import ArtisansListItem from './ArtisansListItem';
	import ArtisansFilters from './ArtisansFilters';
	import ArtisansSortByFilter from './ArtisansSortByFilter';
	import {mapGetters} from 'vuex';
    import CategoriesMixin from "../../utils/CategoriesMixin"
    export default {
        name: 'ArtisansList',
        mixins: [CategoriesMixin],
	    components: {
            ArtisansLocationSearch, ArtisansListItem, ArtisansFilters, ArtisansSortByFilter
	    },
	    props: ['searchBaseCategory','searchCategory','searchFilters'],
	    data(){
          return {
	          baseCategoryFlattenedItems:[],
              flattenedSearchCategoryArray: [],
          }
	    },
	    computed: {
            /*category(){
                return _.last(this.categories)
            },*/
            checkBaseCategorySameAsItem(){
                return this.baseCategory.id === this.category.id;
            },
		    ...mapGetters({
			    baseCategory: 'searchBaseCategory',
			    category: 'searchCategory',
			    filters: 'searchFilters',
			    artisans: 'searchCategoryArtisans',
		    })
	    },
	    methods: {
            flattenBaseCategoryItems(item){
                if(item.items.length) {
                    this.baseCategoryFlattenedItems.push(item);
                    item.items.forEach(item => this.flattenBaseCategoryItems(item));
                }else {
                    this.baseCategoryFlattenedItems.push(item)
                }
            },
            flattenSearchCategoryNestedIds(item){
                if(item.items.length) {
                    this.flattenedSearchCategoryArray.push(item.id);
                    item.items.forEach(item =>this.flattenedSearchCategoryArray.push(item.id));
                }else {
                    this.flattenedSearchCategoryArray.push(item.id)
                }
            },
	    },
	    mounted(){

            this.$store.commit('UPDATE_SEARCH_BASE_CATEGORY', this.searchBaseCategory);
            this.$store.commit('UPDATE_SEARCH_CATEGORY', this.searchCategory);
            this.$store.commit('UPDATE_SEARCH_FILTERS', this.searchFilters);

            this.flattenBaseCategoryItems(this.searchBaseCategory);

            this.$store.commit('UPDATE_SEARCH_BASE_CATEGORY_FLATTENED_ITEMS', this.baseCategoryFlattenedItems);

            this.flattenSearchCategoryNestedIds(this.searchCategory);
            this.$store.commit('UPDATE_SELECTED_SEARCH_CATEGORIES_ITEMS', this.flattenedSearchCategoryArray);

            this.fetchArtisans();

	    }
    }
</script>

<style lang="scss" scoped>
	@import "~bulma/sass/utilities/mixins";
	.sub-category-heading{
		@include mobile{
			padding-left:0 !important;
		}
	}
	.level{
		.level-left,.level-right{
			.level-item{
				@include mobile{
					display:block;
				}
			}
		}
	}
	.sub-category-filter,.sub-category-filter-result{
		@include mobile{
			padding-left: 0 !important;
		}
	}
</style>


