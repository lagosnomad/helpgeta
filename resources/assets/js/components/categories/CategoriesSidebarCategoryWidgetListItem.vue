<template>
	<li class="parent" v-if="checkSelectedItem">
		<a href="#" @click.prevent="getArtisans(item)" :class="{'has-text-weight-semibold': isActive}">
			{{itemName}}
		</a>
		<template v-if="hasItems">
			<ul>
				<categories-sidebar-category-widget-list-item v-for="childItem in item.items" :item="childItem" :key="childItem.id"></categories-sidebar-category-widget-list-item>
			</ul>
		</template>
	</li>
</template>

<script>
    import {mapGetters} from 'vuex';
    import CategoriesMixin from "../../utils/CategoriesMixin"
    export default {
        name: 'CategoriesSidebarCategoryWidgetListItem',
        mixins: [CategoriesMixin],
        props: ['item'],
	    data(){
            return {
                flattenedItemArray: [],
                flattenedSearchCategoryArray: [],
            }
	    },
	    computed: {
            checkSelectedItem(){
                let searchCategoryNestedItemsds = this.selectedSearchCategoryItems;

                this.flattenItemNestedIds(this.item);
                let itemNestedItemsds = this.flattenedItemArray;

                let newArray = _.intersection(searchCategoryNestedItemsds,itemNestedItemsds);
                return newArray.length;
            },
            itemName(){
              if(this.item.parent_id === 0)
                  return "All in "+this.item.category;
              else
                  return this.item.category;
            },
            isActive(){
                return this.item.id === this.searchCategory.id
            },
            hasItems(){
                return !_.isEmpty(this.item.items);
            },
            ...mapGetters([
                'selectedSearchCategoryItems',
	            'searchCategory'
            ])
	    },
	    methods: {
            getArtisans(category){
                this.$store.commit('UPDATE_SEARCH_CATEGORY', category);
                this.flattenSearchCategoryNestedIds(category);
                this.$store.commit('UPDATE_SELECTED_SEARCH_CATEGORIES_ITEMS', this.flattenedSearchCategoryArray);
                this.fetchArtisans();
            },
            flattenItemNestedIds(item){
                if(item.items.length) {
                    this.flattenedItemArray.push(item.id);
	                item.items.forEach(item => this.flattenItemNestedIds(item,true));
                }else {
                    this.flattenedItemArray.push(item.id)
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
	    }

    }
</script>

<style lang="scss" scoped>
	li.parent{
		margin-bottom: .5rem;
		ul{
			margin-left: 1.5rem !important;
			margin-top: .5rem;
			li{
				margin-bottom: 0.5rem;
			}
		}
		a{
			color:#4a4a4a;
			&:hover{
				text-decoration: underline;
			}
			.active{
				font-weight:500;
			}
		}
	}
</style>