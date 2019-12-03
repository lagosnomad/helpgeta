<template>
	<div class="modal-card">
		<section class="modal-card-body">
			<div class="has-text-centered has-padding-3 has-margin-t-6">
				<span class="icon has-text-success"><i class="fa fa-check-circle"></i></span>
				<p class="has-margin-bt-5 is-size-5">
					Your request has been sent successfully, <strong class="is-capitalized">{{artisan.business_name}}</strong> would
					be notified, upon confirmation you would be notified to proceed with payment for the
					<strong>{{selectedCategory.category}}</strong> service selected
				</p>
				<a :href="route('categories')" class="button is-medium is-outlined is-success">Continue</a>
			</div>
		</section>
	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name: 'CheckoutSuccessModal',
        computed: {
            ...mapGetters([
                'selectedCategory',
                'artisan',
            ]),
        }
    }
</script>

<style lang="scss" scoped>
	.modal-card-body{
		.icon{
			font-size: 5rem;
		}
	}
</style>