<template>
	<div class="widget" v-if="hasItems">
		<h4 class="widget-title">Category</h4>
		<div class="widget-content">
			<ul class="categories-sidebar-list">
				<categories-sidebar-category-widget-list-item :item="baseCategory"></categories-sidebar-category-widget-list-item>
			</ul>
		</div>
	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import CategoriesSidebarCategoryWidgetListItem from '../categories/CategoriesSidebarCategoryWidgetListItem';
    export default {
        name: 'CategoriesSidebarCategoryWidget',
        computed: {
            hasItems(){
                return !_.isEmpty(this.baseCategory.items);
            },
            ...mapGetters({
                baseCategory: 'searchBaseCategory',
                category: 'searchCategory',
            })
        },
	    components:{
            CategoriesSidebarCategoryWidgetListItem
	    }
    }
</script>