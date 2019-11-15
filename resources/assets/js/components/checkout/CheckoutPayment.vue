<template>
	<div>
		<a href="#"
		   class="button is-primary is-large"
		   @click.prevent="makePayment"
		   :class="[{'is-loading' : isLoading}]"
		   :disabled="isLoading">
			Make Payment
		</a>

	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import paystackMixin from '../../utils/paystackMixin';
    export default {
        name: 'CheckoutPayment',
	    mixins: [paystackMixin],
        data(){
            return {
                errors: [],
                isLoading: false,
                amount: 1000000 // in kobo
            }
        },
        computed: {
            checkoutItems(){
                return {
                    items: this.selectedCategoryItems,
                    dates: this.requestDates,
                    total: this.checkoutTotal,

                };
            },
            isDisabledPaymentButton(){
                let errors = this.validateCheckoutItems(this.checkoutItems);
                return !!(errors.length)
            },

            metadata(){
                return {

                }
            },
            ...mapGetters([
                'selectedCategoryItems',
                'requestDates',
                'checkoutTotal',
                'checkoutTotalHours',
                'checkoutTotalDays',
                'artisan',
                'category'
            ]),
        },
        methods: {
            makePayment(){
                let errors = this.validateCheckoutItems(this.checkoutItems);
                if(errors.length){
                    this.displayValidationMessages(errors);
                    return;
                }
                this.isLoading = true;
                this.payWithPaystack();
            },
            validateCheckoutItems(items){
                let errors = [];
                if(!items.items.length) errors.push('Select at least one sub service');
                if(!items.dates.length) errors.push('Add at least one date');
                if(items.total === 0) errors.push('Total cannot be zero');
                return errors;
            },
            displayValidationMessages(errors){
                let message = '';
                errors.forEach(error => {
                    message += "<p>"+error+"</p>";
                });
                this.$toast.open({
                    duration: 3000,
                    message: message,
                    type: 'is-danger',
                })
            },
            callback: function(response){
                console.log(response)
            },
            close: function(){
                this.isLoading = false
            },
        },
        mounted(){
            /*this.errors = this.validateCheckoutItems(this.checkoutItems);*/

        }
    }
</script>