<template>
	<table class="table is-hoverable is-fullwidth">
		<tbody>
		<template v-for="category in categories" v-if="hasAmount(category)">
		<tr>
			<td v-if="checkout" style="width:30px;vertical-align: middle">
				<div class="field">
					<input
							v-model="selectedCategory"
					       class="is-checkradio is-medium"
					       :id="category.slug"
					       type="radio"
					       :value="category"
					       name="selectedCategory">
					<label :for="category.slug"></label>
				</div>
			</td>
			<td>
				<span class="is-size-6">{{category.category}}</span>
				<p class="parent">{{getParents(category.uri)}}</p>
			</td>
			<td style="vertical-align: middle">
				<span class="is-size-6">
					{{category.pivot.amount | currency}}
				</span>
			</td>
		</tr>
		<template v-if="checkout">
			<tr v-if="category.slug === selectedCategory.slug">
				<td colspan="3">
					<div class="has-padding-5 has-no-padding-l-mobile">
						<p class="is-size-6 has-padding-b-4 has-text-weight-semibold">Add Request Day(s) for {{category.category}}</p>
						<checkout-request-time-form :category="category"></checkout-request-time-form>
					</div>
				</td>
			</tr>
		</template>

		</template>
		</tbody>
	</table>
</template>

<script>
	import {mapGetters} from 'vuex';
    import CheckoutRequestTimeForm from '../checkout/CheckoutRequestTimeForm';
    export default {
        name: 'ArtisansCategories',
	    components: {
            CheckoutRequestTimeForm
	    },
	    computed:{
            selectedCategory: {
                get () {
                    return this.$store.getters.selectedCategory
                },
                set (value) {
                    this.$store.commit('UPDATE_SELECTED_CATEGORY',value);
                }
            },
		    getDefaultCategory(){
                let category = this.categories.find(item => item.uri === this.searchCategory.uri);
                return (!_.isEmpty(category)) ? category : null;
		    },
		    ...mapGetters(['searchCategory'])
	    },
        props:{
            categories: Array,
            checkout:{
                type: Boolean,
                default: false
            }
        },
	    methods: {
            getParents(category_uri){
                let parents = category_uri.split('/');
	            parents.pop();
	            if(parents.length)
	                return 'In : '+parents.join(", ");
            },
            hasAmount(category){
                return Math.round(category.pivot.amount);
            },
	    },
	    mounted(){
            this.$store.commit('UPDATE_SELECTED_CATEGORY',this.getDefaultCategory);
	    }
    }
</script>
<style lang="scss" scoped>
	.table{
		td{
			p.parent{
				margin-bottom: 0;
				font-size: 0.85rem !important;
			}
			span.is-size-6{
				font-size:1.1rem !important;
			}
		}
	}
</style>