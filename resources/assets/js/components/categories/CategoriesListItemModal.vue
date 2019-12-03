<template>
	<div class="modal-card">
		<section class="modal-card-body">

			<div class="has-text-centered has-margin-b-3">
				<h2 class="title is-4">Find Service Providers</h2>
				<p class="subtitle is-7">
					Click on the service on any sub categories below <br>to start browsing for service providers
				</p>
			</div>

			<div class="columns">
				<div class="column is-5">
					<div class="card category-card bg-grey">
						<a :href="category.url">
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
				</div>
				<div class="column is-7">
					<ul class="sub-categories-listing">
						<li>
							<a :href="category.url">
								<span class="icon"><i class="fa fa-chevron-right"></i></span>
								<span>All</span>
							</a>
						</li>
						<li v-for="item in category.items">
							<a :href="item.url">
								<span class="icon"><i class="fa fa-chevron-right"></i></span>
								<span>{{item.category}}</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
    export default {
        name: 'CategoriesListItemModal',
	    props:['category'],
	    data(){
            return {

            }
	    },
	    components: {

	    }
    }
</script>

<style lang="scss" scoped>
	.modal-card-body{
		padding:3rem 2rem;
	}
</style>