<template>
	<div>
		<b-field label="Select a Service">
			<categories-select-input></categories-select-input>
		</b-field>
		<div class="categories-form">
			<b-loading :is-full-page="false" :active.sync="isLoading" :can-cancel="false"></b-loading>
			<categories-nested-list></categories-nested-list>
		</div>
	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
	import CategoriesSelectInput from './CategoriesSelectInput';
	import CategoriesNestedList from './CategoriesNestedList';
    export default {
        name: 'CategoriesAccountForm',
	    props:['categoriesIds','categoriesIdsWithAmounts','baseCategoryId'],
        components:{
            CategoriesSelectInput,CategoriesNestedList
        },
	    computed: {
            ...mapGetters([
                'isLoading',
            ])
	    },
	    mounted(){
            this.$store.commit('SAVED_SELECTED_SUB_CATEGORIES_ITEMS', this.categoriesIds);
            this.$store.commit('SAVED_SUB_CATEGORIES_ITEMS_WITH_AMOUNTS', this.categoriesIdsWithAmounts);
            this.$store.commit('UPDATE_CATEGORY_ID', this.baseCategoryId);
	    }
    }
</script>

<style lang="scss" scoped>
	.categories-form{
		position: relative;
		margin-top:2rem;
	}
</style>