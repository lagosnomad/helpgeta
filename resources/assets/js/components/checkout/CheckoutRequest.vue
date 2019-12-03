<template>
	<div class="columns">
		<div class="column has-border-right">
			<div class="checkout-widget">
				<artisans-list-item :artisan="artisan" checkout></artisans-list-item>
			</div>
			<div class="checkout-widget">
				<div class="checkout-widget-header">
					<h3>Choose a Service</h3>
				</div>
				<artisans-categories :categories="artisan.categories" checkout></artisans-categories>
			</div>
			<div class="checkout-widget">
				<div class="checkout-widget-header has-border-top">
					<h3>Contact Information</h3>
				</div>
				<div class="checkout-widget-content has-padding-r-6">
					<checkout-location-form></checkout-location-form>
				</div>
			</div>
		</div>
		<div class="column is-4">
			<div class="checkout-widget">
				<div class="checkout-widget-header is-paddingless-t">
					<h3 class="has-padding-l-5 has-no-padding-l-mobile">Request Summary</h3>
				</div>
				<checkout-summary></checkout-summary>
			</div>
		</div>
	</div>
</template>

<script>
    import ArtisansListItem from '../artisans/ArtisansListItem';
    import ArtisansCategories from '../artisans/ArtisansCategories';
    import CheckoutRequestTimeForm from './CheckoutRequestTimeForm';
    import CheckoutSummary from './CheckoutSummary';
    import CheckoutLocationForm from './CheckoutLocationForm';
    import {mapGetters} from 'vuex';
    export default {
        name: 'CheckoutRequest',
	    props: ['artisan','refCategory','user'],
        computed: {
            ...mapGetters(['categoryItems'])
        },
        components: {
	        ArtisansListItem,ArtisansCategories,CheckoutRequestTimeForm,CheckoutSummary,CheckoutLocationForm
        },
	    beforeMount(){
            this.$store.commit('UPDATE_SEARCH_CATEGORY',this.refCategory);
            this.$store.commit('UPDATE_ARTISAN',this.artisan);
            this.$store.commit('UPDATE_USER',this.user);
	    }
    }
</script>

<style lang="scss" scoped>
	@import "~bulma/sass/utilities/mixins";
	.checkout-widget{
		.checkout-widget-header{
			padding: 1rem 1rem 1rem 0;
			border-bottom: thin solid #dbdbdb;
			margin-bottom: 1.25rem;
			h3{
				font-weight: 500 !important;
				font-size: 1.25rem;
			}
		}
	}
</style>