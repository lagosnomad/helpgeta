<template>
		<a href="#"
		   class="button is-primary"
		   @click.prevent="showModal">
			<span class="icon"><i class="fa fa-credit-card"></i></span>
			<span>Make Payment</span>
		</a>
</template>

<script>
	import OrdersPaymentModal from './OrdersPaymentModal'
    export default {
        name: 'OrdersPaymentButton',
	    props: ['order'],
        methods: {
            showModal(){
                this.$modal.open({
                    parent: this,
                    component: OrdersPaymentModal,
                    hasModalCard: true,
                    props:{
                        order: this.order,
                    }
                })
            }
        },
        mounted(){
            this.showModal();
        }
    }
</script>