<template>
	<div class="categories-sidebar">
		<category-widget></category-widget>
		<price-widget></price-widget>
		<rating-widget></rating-widget>
	</div>
</template>

<script>
	import CategoriesSidebarCategoryWidget from '../categories/CategoriesSidebarCategoryWidget';
	import CategoriesSidebarPriceWidget from '../categories/CategoriesSidebarPriceWidget';
	import CategoriesSidebarRatingWidget from '../categories/CategoriesSidebarRatingWidget';
    export default {
        name: 'CategoriesSidebar',
	    components: {
            CategoryWidget:CategoriesSidebarCategoryWidget,
            PriceWidget:CategoriesSidebarPriceWidget,
            RatingWidget:CategoriesSidebarRatingWidget,
	    }
    }
</script>

<style lang="scss">
	.categories-sidebar{
		.widget{
			h4.widget-title{
				font-weight:400;
				font-size:1.1rem;
			}
			.widget-content{
				margin-right:1rem;
			}
		}
		.widget + .widget {
			margin-top: 2rem;
		}
	}
</style>