<template>
	<li class="parent" v-if="checkSelectedItem">
		{{item.category}} <span class="icon" @click="removeItem(item)"><i class="fa fa-trash"></i></span>
		<template v-if="hasItems">
			<input type="hidden" :name="setInputName" value="0.00">
			<ul>
				<categories-nested-pricing-list-item v-for="childItem in item.items" :item="childItem" :key="childItem.id"></categories-nested-pricing-list-item>
			</ul>
		</template>
		<template v-else>
			<div class="field has-addons">
				<p class="control">
					<a class="button is-static is-small">₦</a>
				</p>
				<p class="control is-expanded">
					<input class="input is-small" type="number" :name="setInputName" :value="getSavedValue" required>
				</p>
				<p class="control" v-if="item.is_hourly_based">
					<a class="button is-static is-small"> / hour</a>
				</p>
			</div>
		</template>
	</li>
</template>

<script>
	import {mapGetters} from 'vuex';
    export default {
        name: 'CategoriesNestedPricingListItem',
	    props: ['item'],
	    data(){
          return {
              flattenedItemArray: []
          }
	    },
	    computed: {
            setInputName(){
                return 'add_category_item['+this.item.id+']';
            },
		    getSavedValue(){
                let obj = this.savedSubCategoriesItemsWithAmounts;
                return obj[this.item.id];
		    },
            checkSelectedItem(){
                this.flattenItemNestedIds(this.item);
				let newArray = _.intersection(this.flattenedItemArray,this.selectedSubCategoriesItems)
	            return newArray.length;
            },
            hasItems(){
                return this.item.items.length;
            },
		    ...mapGetters([
		        'selectedSubCategoriesItems',
			    'savedSubCategoriesItemsWithAmounts'
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
	        removeItem(item){
                this.flattenItemNestedIds(item);
                this.flattenedItemArray.forEach(itemId => this.$store.commit('REMOVE_SELECTED_CATEGORY_ITEM', itemId));
	        }
        },
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
		p:not(:last-child){
			margin-bottom:0 !important;
		}
		.icon{
			color: red;
			cursor: pointer;
		}
	}
</style>