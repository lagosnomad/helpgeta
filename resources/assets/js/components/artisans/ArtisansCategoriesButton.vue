<template>
	<div>
		<a href="#"
		   class="button is-primary"
		   @click.prevent="showModal()"
		   :class="[size]">
			<slot></slot>
		</a>

	</div>
</template>

<script>
    import ArtisansCategoriesModal from './ArtisansCategoriesModal';
    export default {
        name: 'ArtisansCategoriesButton',
	    props: ['size','categories','artisanId'],
	    methods: {
            showModal(){
                this.$modal.open({
                    parent: this,
                    component: ArtisansCategoriesModal,
                    hasModalCard: true,
	                props:{
                        categories: this.categories,
		                artisanId: this.artisanId
	                }
                })
            }
	    }
    }
</script>