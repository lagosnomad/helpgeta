<template>
	<li class="parent" v-if="checkSelectedItem">
		<a href="#" @click.prevent="addSelectedSubCategoryItem(item)">{{item.category}}</a>
		<template v-if="item.items.length">
			<ul>
				<categories-nested-list-item v-for="childItem in item.items" :item="childItem" :key="childItem.id"></categories-nested-list-item>
			</ul>
		</template>
	</li>
</template>

<script>
	import {mapGetters} from 'vuex';
    export default {
        name: 'CategoriesNestedListItem',
	    props: ['item'],
        data(){
            return {
                flattenedItemArray: []
            }
        },
	    computed: {
            checkSelectedItem(){
                this.flattenItemNestedIds(this.item);
                let newArray = _.difference(this.flattenedItemArray,this.selectedSubCategoriesItems);
                return newArray.length;
            },
		    ...mapGetters([
		        'selectedSubCategoriesItems'
		    ])
	    },
        methods: {
            flattenItemNestedIds(item){
                if(item.items.length) {
                    this.flattenedItemArray.push(item.id)
                    item.items.forEach(item => this.flattenItemNestedIds(item));
                }else {
                    this.flattenedItemArray.push(item.id)
                }
            },
            addSelectedSubCategoryItem(item){

                if(item.items.length)
                    item.items.forEach(item => this.addSelectedSubCategoryItem(item));

                this.$store.commit('UPDATE_SELECTED_SUB_CATEGORIES_ITEMS', item.id)

            }

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
	}
</style>