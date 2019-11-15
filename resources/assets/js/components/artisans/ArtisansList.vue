<template>
	<div id="artisan-listings" class="list-view">
		<div class="content">
			<h3 class="title is-5"><span class="has-text-primary">{{artisans.length}}</span> Service Provider(s) Available
			</h3>
		</div>
		<artisans-filter-box></artisans-filter-box>
		<div>
			<b-loading :is-full-page="false" :active.sync="isLoading" :can-cancel="false"></b-loading>

			<template v-for="artisan in artisans">
				<artisans-list-item :artisan="artisan" :key="artisan.id" :category-id="categoryId"></artisans-list-item>
			</template>
		</div>

	</div>
</template>

<script>
	import ArtisansFilterBox from './ArtisansFilterBox';
	import ArtisansListItem from './ArtisansListItem';
    export default {
        name: 'ArtisansList',
	    components: {
            ArtisansFilterBox, ArtisansListItem
	    },
	    props: ['categoryId'],
	    data(){
          return {
	          artisans: [],
              isLoading: false
          }
	    },
	    mounted(){
            this.isLoading = true;
            axios.get('/api/artisans/'+this.categoryId)
                .then((response) => {
                    this.isLoading = false;
                    this.artisans = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });

	    }
    }
</script>


