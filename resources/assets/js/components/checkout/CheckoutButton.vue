<template>
	<div>
		<div class="field">
			<p class="control">
				<textarea class="textarea" placeholder="add a note to the service provider" v-model="notes"></textarea>
			</p>
		</div>
		<a href="#"
		   class="button is-primary is-large is-fullwidth"
		   @click.prevent="submit"
		   :class="[{'is-loading' : isLoading}]"
		   :disabled="isLoading">
			Check Availability
		</a>
		<p class="is-size-7">
			Click on the button above to check availability of the service provider for this service request.
			The service provider would be notified of this request and confirm availability
		</p>

	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import CheckoutSuccessModal from './CheckoutSuccessModal';
    export default {
        name: 'CheckoutButton',
        data(){
            return {
                errors: [],
                isLoading: false,
	            notes: ''
            }
        },
        computed: {
            checkoutItems(){
                return {
                    notes: this.notes,
                    qty: 1,
                    item: this.selectedCategory,
                    artisan: this.artisan,
                    dates: this.requestDates,
                    total: this.checkoutTotal,
	                total_hours: this.checkoutTotalHours,
	                total_days: this.checkoutTotalDays,
                    address: this.userAddress,
                    phone: this.userPhone,
                    landmark: this.userLandmark,
                    state_id: this.userStateId,
                    city_id: this.userCityId,
                };
            },
            ...mapGetters([
                'selectedCategory',
                'requestDates',
                'checkoutTotal',
                'checkoutTotalHours',
                'checkoutTotalDays',
                'artisan',
                'category',
	            'userAddress',
	            'userPhone',
	            'userLandmark',
	            'userStateId',
	            'userCityId',
            ]),
        },
        methods: {
            submit(){
                let errors = this.validateCheckoutItems(this.checkoutItems);
                if(errors.length){
                    this.displayValidationMessages(errors);
                    return;
                }
                this.isLoading = true;
                this.apiRequest();
            },
            validateCheckoutItems(items){
                let errors = [];
                if(!items.item) errors.push('Select a service');
                if(!items.address) errors.push('Add contact address');
                if(!items.phone) errors.push('Add contact phone number');
                if(!items.state_id) errors.push('Select state');
                if(!items.city_id) errors.push('Select city');
                if(!items.dates.length) errors.push('Add at least one day for this request');
                if(items.total === 0) errors.push('Total cannot be zero');
                return errors;
            },
            displayValidationMessages(errors){
                let message = '<p class="has-text-white has-padding-b-7 has-text-weight-semibold">Please fix the following:</p>';
                //let message = '<ul>';
                errors.forEach(error => {
                    message += "<p>"+error+"</p>";
                });
                //message += '</ul>'
                this.$toast.open({
                    duration: 3000,
                    message: message,
                    type: 'is-danger',
                })
            },
            apiRequest(){
                axios.post(route('api.orders.store'),this.checkoutItems)
                    .then((response) => {
                        this.isLoading = false;
                        this.$modal.open({
                            parent: this,
                            component:CheckoutSuccessModal ,
                            hasModalCard: true,
	                        onCancel: () => window.location = route('categories')
                        })
                    })
                    .catch((error) => {
                        this.isLoading = false;
                    });
            }
        }
    }
</script>