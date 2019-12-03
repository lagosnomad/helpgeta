<template>
	<div>
		<template v-if="!checkIfCategoryIsEmpty">
			<p class="title is-6">{{category.category}}</p>
			<template v-if="category.items.length">
				<div class="notification">
					Select one or more sub services you offer below and also add their respective pricing
				</div>
				<input type="hidden" :name="setInputName" value="0.00">
				<div class="columns">
					<div class="column is-5">
						<div class="box has-scrollbar">
							<p class="title is-6 has-text-weight-light">Select Categories</p>
							<ul class="categories-nested-list">
								<categories-nested-list-item v-for="item in category.items" :item="item"
								                             :key="item.id"></categories-nested-list-item>
							</ul>
						</div>
					</div>
					<div class="column is-7">
						<div class="box has-scrollbar-pricing">
							<p class="title is-6 has-text-weight-light">Selected Categories with Pricing</p>
							<template v-if="selectedKeys.length">
								<ul class="categories-nested-list">
									<categories-nested-pricing-list-item v-for="item in category.items" :item="item"
									                                     :key="item.id"></categories-nested-pricing-list-item>
								</ul>
							</template>
							<template v-else>
								<article class="message is-info">
									<div class="message-body">Services you selected will appear here with options for
										you to add your pricing for each
									</div>
								</article>
							</template>
						</div>
					</div>
				</div>
			</template>
			<template v-else>
				<div class="notification">
					Add pricing for the above selected service
				</div>
				<div class="field has-addons">
					<p class="control">
						<a class="button is-static">₦</a>
					</p>
					<p class="control">
						<input class="input" type="number" :name="setInputName" :value="getSavedValue" required>
					</p>
					<p class="control" v-if="category.is_hourly_based">
						<a class="button is-static"> / hour</a>
					</p>
				</div>
			</template>
		</template>
	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import CategoriesNestedListItem from './CategoriesNestedListItem';
    import CategoriesNestedPricingListItem from './CategoriesNestedPricingListItem';

    export default {
        name: 'CategoriesNestedList',
        computed: {
            setInputName(){
                return 'add_category_item['+this.category.id+']';
            },
            getSavedValue(){
                let obj = this.savedSubCategoriesItemsWithAmounts;
                return obj[this.category.id];
            },
            checkIfCategoryIsEmpty() {
                return _.isEmpty(this.category)
            },
            ...mapGetters({
                category: 'selectedCategoryWithNestedItems',
                selectedKeys: 'selectedSubCategoriesItems',
                savedSubCategoriesItemsWithAmounts: 'savedSubCategoriesItemsWithAmounts',
            }),
        },
        components: {
            CategoriesNestedListItem, CategoriesNestedPricingListItem
        },
        mounted() {

        }

    }
</script>

<style lang="scss" scoped>
	.box.has-scrollbar {
		max-height: 350px;
		overflow-y: scroll;
	}

	.box.has-scrollbar-pricing {
		max-height: 450px;
		overflow-y: scroll;
	}

	.categories-nested-list {
		margin-left: 1rem;
		margin-top: .5rem;
	}
</style>