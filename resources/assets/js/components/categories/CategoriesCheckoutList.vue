<template>
	<div>
		<div class="columns">
			<div class="column is-3">
				<categories-list-item :category="category"></categories-list-item>
			</div>
			<div class="column is-9">
				<template v-if="category.items.length">
					<b-message>Select one or more service pricing below</b-message>
					<ul class="categories-checkout-list">
						<categories-checkout-list-item v-for="item in category.items" :item="item" :key="item.id"></categories-checkout-list-item>
					</ul>
				</template>
				<template v-else>
					<b-message>Pricing for the selected service</b-message>
					<b-radio v-model='selectedCategoryItem' :native-value="category" size="is-medium">{{category.amount}}
						<span v-if="category.is_hourly_based"> / Hour</span>
					</b-radio>
				</template>

			</div>
		</div>
	</div>
</template>

<script>
	import CategoriesListItem from './CategoriesListItem';
	import CategoriesCheckoutListItem from './CategoriesCheckoutListItem';
    export default {
        name: 'CategoriesCheckoutList',
	    props: ['category'],
	    data(){
            return {
                selectedCategoryItem: this.category
            }
	    },
	    components: {
            CategoriesListItem,CategoriesCheckoutListItem
	    },
	    mounted(){
            if(!this.category.items.length)
                this.$store.commit('ADD_CATEGORY_ITEM',this.selectedCategoryItem);
	    }

    }
</script>

<style lang="scss" scoped>
	.categories-checkout-list{

	}
</style>