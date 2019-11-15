<template>
	<div class="card artisan-card bg-grey">
		<div class="card-content">
			<div class="media">
				<div class="media-left">
					<figure class="image is-64x64">
						<img :src="artisan.avatar" class="is-circled"
						     alt="Placeholder image">
					</figure>
				</div>
				<div class="media-content">
					<a :href="artisan.url+'?category='+categoryId" class="artisan-card-name">
						{{artisan.business_name}}
					</a>
					<div class="level">
						<div class="level-left">
							<div class="level-item">
								<span class="icon"><i class="fa fa-suitcase"></i></span>
								<span v-html="artisan.category_list"></span>
							</div>
							<div class="level-item">
								<span class="icon"><i class="fa fa-map-marker"></i></span>
								Surulere, Lagos
							</div>
						</div>
					</div>
				</div>
				<div class="media-right">
					<div class="ratings">
						<span class="average-rating is-size-7">0.0</span>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<span class="is-size-7">0 Reviews</span>
					</div>
					<div class="buttons">
						<a :href="artisan.url+'?category='+categoryId" class="button is-primary is-outlined is-small" :class="{'w-full':!categoryId}">View Profile</a>
						<request-button :artisan-id="artisan.id" :category-id="categoryId" size="is-small"></request-button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
	    name: 'ArtisansListItem',
		props:[
		    'artisan','categoryId'
		]
	}
</script>