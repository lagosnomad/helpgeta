<template>
	<div class="widget">
		<h4 class="widget-title">Rating</h4>
		<div class="widget-content">
			<div class="field">
				<b-radio v-model="selectedRating" native-value="default">
					Show All
				</b-radio>
			</div>
			<div class="field" v-for="n in 4">
				<b-radio v-model="selectedRating" :native-value="n">
					{{n}} star and higher
				</b-radio>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: 'CategoriesSidebarRatingWidget',
	    data(){
            return {
                selectedRating: 0
            }
	    },
	    watch: {
            selectedRating(value){
                if(value)
                    this.$store.commit('ADD_SEARCH_FILTER',{ name: 'rating_min', value: value , obj: {} });
                if(value==='default')
                    this.$store.commit('REMOVE_SEARCH_FILTER_BY_KEY','rating_min');

                this.fetchArtisans();
            }
	    }
    }
</script>