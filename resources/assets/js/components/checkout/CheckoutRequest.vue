<template>
	<div>
		<div class="checkout-widget">
			<p class="title is-5">Service Provider Selected</p>
			<artisans-list-item :artisan="artisan" :key="artisan.id" :category-id="0"></artisans-list-item>
		</div>
		<div class="checkout-widget">
			<p class="title is-5">Service Selected and Pricing</p>
			<categories-checkout-list :category="category"></categories-checkout-list>
		</div>
		<div class="checkout-widget">
			<p class="title is-5">Service Date & Time</p>
			<div class="notification">Add one or more days with time <span v-if="category.is_hourly_based">and number of hours</span></div>
			<checkout-request-time-form :category="category"></checkout-request-time-form>
		</div>
		<div class="checkout-widget">
			<checkout-summary></checkout-summary>
		</div>
	</div>
</template>

<script>
    import ArtisansListItem from '../artisans/ArtisansListItem';
    import CategoriesCheckoutList from '../categories/CategoriesCheckoutList';
    import CheckoutRequestTimeForm from './CheckoutRequestTimeForm';
    import CheckoutSummary from './CheckoutSummary';
    import {mapGetters} from 'vuex';
    export default {
        name: 'CheckoutRequest',
	    props: ['artisan','category'],
        computed: {
            ...mapGetters(['categoryItems'])
        },
        components: {
	        ArtisansListItem,CategoriesCheckoutList,CheckoutRequestTimeForm,CheckoutSummary
        },
	    beforeMount(){
            this.$store.commit('UPDATE_CATEGORY',this.category);
            this.$store.commit('UPDATE_ARTISAN',this.artisan);
	    }
    }
</script>

<style lang="scss" scoped>
	.checkout-widget{
		margin-bottom:2rem;
	}
</style>