<template>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title has-text-weight-semibold">Make Payment</p>
		</header>
		<section class="modal-card-body">
			<div class="columns">
				<div class="column has-border-right">
					<div class="heading has-border-bottom has-padding-b-6 has-margin-b-6">
						<h4>Discount Codes</h4>
					</div>
					<div class="content">
						<div class="field">
							<label class="label has-text-weight-normal">Enter your coupon code if you have one</label>
							<div class="control">
								<input class="input" type="text">
							</div>
						</div>
						<div class="field">
							<div class="control">
								<button class="button is-dark">Apply Coupon</button>
							</div>
						</div>
					</div>
				</div>
				<div class="column">
					<hr class="is-hidden-tablet">
					<table class="table">
						<tbody>
						<tr>
							<td class="v-align">
								<span class="title is-6">Total: </span>
							</td>
							<td>
								<span class="is-size-3 has-text-weight-semibold">{{this.order.total | currency}}</span>
							</td>
						</tr>
						</tbody>
					</table>
					<figure>
						<img src="/assets/public/img/cards.png" alt="">
					</figure>
				</div>
			</div>
		</section>
		<footer class="modal-card-foot">
			<button class="button is-medium" type="button" @click="$parent.close()">Close</button>
			<button class="button is-medium is-primary" @click="makePayment" :class="[{'is-loading' : isLoading}]" :disabled="isLoading">Pay Now</button>
		</footer>
	</div>
</template>

<script type="text/babel">
    import paystackMixin from '../../utils/paystackMixin';
    export default {
        name: 'OrdersPaymentModal',
        props: ['order'],
        mixins: [paystackMixin],
        data(){
            return {
                isLoading: false,
            }
        },
        computed: {
            email(){
				return this.order.user.email;
            },
            amount(){
                return this.order.total * 100;
            },
            metadata(){
                return {
                    custom_fields: [
                        {
                            display_name: "Order Number",
                            variable_name: "order_number",
                            value: this.order.order_number
                        },
                        {
                            display_name: "Service Requested",
                            variable_name: "service_requested",
                            value: this.order.item.category
                        }
                    ]
                }
            },
        },
        methods: {
            makePayment(){
                this.isLoading = true;
                this.payWithPaystack();
            },
            callback(response){
                if(response.status === 'success'){
                    axios.post(route('api.orders.payment.update',[this.order.order_number])+'?trxref='+response.reference)
                        .then((response) => {
                            this.$toast.open({
                                message: 'Payment Successful...Refreshing this page',
                                type: 'is-success',
	                            duration: 3000
                            });
                            setTimeout(()=>{
                                document.location.href = route('account.orders.show', [this.order.order_number])
	                        },3000)
                        })
                        .catch((error) => {
                            console.log(error.response);
                            this.$toast.open({
                                message: error.response.data,
                                type: 'is-danger',
                            });
                        });
                }else{
                    this.isLoading = false;
                    this.$toast.open({
                        message: 'An error occurred. Please try again',
                        type: 'is-danger'
                    });
                }
            },
            close(){
                this.isLoading = false
            }
        },
    }
</script>

<style lang="scss" scoped>
	.modal-card-foot{
		justify-content: flex-end;
	}
	.v-align {
		vertical-align: middle;
	}
	.heading{
		h4{
			font-size:1rem;
		}
	}
	hr{
		margin: .75rem 0 !important;
	}
</style>