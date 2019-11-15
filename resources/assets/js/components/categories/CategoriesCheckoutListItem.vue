<template>
	<li class="parent">
		<template v-if="item.items.length">
			<strong>{{item.category}} </strong>
			<ul>
				<categories-checkout-list-item v-for="childItem in item.items" :item="childItem" :key="childItem.id"></categories-checkout-list-item>
			</ul>
		</template>
		<template v-else>
			<categories-check-button :item="item" :checked="selected.includes(item)" @change="onChange"></categories-check-button>
		</template>
	</li>
</template>

<script>
	import CategoriesCheckButton from './CategoriesCheckButton'
    export default {
        name: 'CategoriesCheckoutListItem',
	    props: ['item'],
	    data(){
            return {
                selected: [],
            }
	    },
	    components: {
            CategoriesCheckButton
	    },
	    methods: {
            onChange(item, $event){
                if ($event.target.checked)
                    this.$store.commit('ADD_CATEGORY_ITEM',item);
                else {
                    this.$store.commit('REMOVE_CATEGORY_ITEM',item);
                }
            }
	    }
    }
</script>

<style lang="scss" scoped>
	li.parent{
		margin-bottom: 1rem;
		ul{
			margin-left: 1.5rem !important;
			margin-top: 1rem;
			li{
				margin-bottom: 0.7rem;
			}
		}
	}
</style>