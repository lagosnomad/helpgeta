<template>
	<div>
		<div class="field has-addons has-addons-centered is-block-mobile">
			<p class="control">
				<a class="button is-static">
					Location
				</a>
			</p>
			<states-select-input is-filter @stateInputChange="updateStateFilter"
			                     :selected="selectedStateFromFilter"></states-select-input>
			<cities-select-input @cityInputChange="updateCityFilter"
			                     :selected="selectedCityFromFilter"></cities-select-input>
		</div>
	</div>
</template>

<script>
    import StatesSelectInput from '../states/StatesSelectInput'
    import CitiesSelectInput from '../cities/CitiesSelectInput'
    import CategoriesMixin from "../../utils/CategoriesMixin"
    import {mapGetters} from 'vuex'

    export default {
        name: 'ArtisansLocationSearch',
        mixins: [CategoriesMixin],
        props: ['searchFilters'],
        components: {
            StatesSelectInput,
            CitiesSelectInput
        },
        data() {
            return {
                states: [],
                cities: [],
            }
        },
        computed: {
            selectedStateFromFilter() {
                return this.getFilterId('state', true)
            },
            selectedCityFromFilter() {
                return this.getFilterId('city', true)
            },
        },
        methods: {
            updateStateFilter(state) {
                this.$store.commit('ADD_SEARCH_FILTER', {name: 'state', value: state.name, obj: state});
                this.fetchArtisans();
            },
            updateCityFilter(city) {
                this.$store.commit('ADD_SEARCH_FILTER', {name: 'city', value: city.name, obj: city});
                this.fetchArtisans();
            },
        }
    }
</script>

<style lang="scss" scoped>
	@import "~bulma/sass/utilities/mixins";

	.field {
		.control {
			.button.is-static {
				@include mobile {
					width: 100%;
				}
			}
		}
	}
</style>