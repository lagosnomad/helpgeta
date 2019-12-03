<template>
	<div class="field">
		<!--<p class="control has-icons-left">
			<input class="input is-fullwidth" type="email" placeholder="Find services">
			<span class="icon is-small is-left">
                                    <i class="fa fa-search"></i>
                                </span>
		</p>-->
		<b-autocomplete
				v-model="query"
				:data="data"
				placeholder="Find a Service"
				icon="search"
				@input="getAsyncData"
				:loading="isFetching"
				autocomplete="off"
				field="category"
				@select="getSelected">
			<template slot="empty">No results found</template>
		</b-autocomplete>
	</div>
</template>

<script>
    export default {
        name: 'SearchInput',
        data() {
            return {
                data: [],
                query: '',
                selected: null,
                isFetching: false
            }
        },
        methods: {
            getAsyncData: _.debounce(function () {
                this.data = [];
                this.isFetching = true;
                axios.get(route('api.categories.search'),{
                   params: {
                       query: this.query
                   }
                })
                    .then((response) => {
                        this.isFetching = false;
                        this.data = response.data;
                    })
                    .catch((error) => {
                        this.isFetching = false;
                        console.log(error);
                    });
            }, 500),
	        getSelected(selected){
                window.location = route('categories.show',{uri: selected.uri, sort: 'rating'})
	        }
        }
    }
</script>

<style lang="scss" scoped>
	@import "~bulma/sass/utilities/mixins";

	.input {
		@include mobile {
			box-shadow: none !important;
		}
	}
</style>