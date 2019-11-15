<template>
	<div class="card category-card" :class="bgColor">
		<a :href="category.url" @click.prevent="showModal">
			<div class="card-content">
				<figure class="category-icon">
					<img :src="category.image" alt="">
				</figure>
				<div class="category-title">
					<h4 class="title is-6">{{category.category}}</h4>
				</div>
			</div>
		</a>
	</div>
</template>

<script>
    import CategoriesListItemModal from './CategoriesListItemModal';
    export default {
        name: 'CategoriesListItem',
	    props: {
            category: Object,
            bgColor:{
                default: 'bg-grey'
            }
        },
        methods: {
            showModal(){
                this.$modal.open({
                    parent: this,
                    component: CategoriesListItemModal,
                    hasModalCard: true,
                    props:{
                        category: this.category,
                    }
                })
            }
        }
    }
</script>