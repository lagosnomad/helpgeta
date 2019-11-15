<template>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">This Service Provider's Categories</p>
		</header>
		<section class="modal-card-body">
				<div class="notification is-info">
					Below are the services rendered by this service provider, choose one to make a request
				</div>
				<div class="field" v-for="category in categories">
						<b-radio v-model="categoryId" :native-value="category.id" name="category" size="is-medium">{{category.category}}</b-radio>
				</div>
		</section>
		<footer class="modal-card-foot">
			<request-button :artisan-id="artisanId" :category-id="categoryId" size="is-medium"></request-button>
		</footer>
	</div>
</template>

<script>
    export default {
        name: 'ArtisansCategoriesModal',
	    props:['categories','artisanId'],
	    data(){
            return {
                categoryId: this.categories[0].id
            }
	    }
    }
</script>