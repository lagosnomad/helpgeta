<template>
	<div>
		<div class="columns" v-for="categories in chunkedCategories">
			<div class="column is-3" v-for="category in categories" :key="category.id">
				<categories-list-item  :category="category"></categories-list-item>
			</div>
		</div>
	</div>
</template>

<script>
	import CategoriesListItem from './CategoriesListItem';
    export default {
        name: 'CategoriesList',
        data() {
            return {

            }
        },
	    computed: {
            chunkedCategories () {
                return _.chunk(this.categories,4)
            }
	    },
	    props: ['categories'],
	    components:{
            CategoriesListItem,
        }
    }
</script>