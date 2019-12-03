<template>
	<a href="#"
	   class="button"
	   @click.prevent="submit"
	   :class="[{'is-loading' : isLoading},color]"
	   :disabled="isLoading">
		<slot></slot>
	</a>
</template>

<script type="text/babel">
    export default {
        name: 'OrdersStatusButton',
        props: {
            order: Object,
            status: {
                type: String,
                default: 'cancelled'
            },
            color: {
                type: String,
                default: 'is-primary'
            }
        },
        data() {
            return {
                isLoading: false
            }
        },
        methods: {
            submit() {
                if(this.status==='cancelled')
                    this.confirmCancellation();
                else
                    this.updateStatus();
            },
            confirmCancellation() {
                this.$dialog.confirm({
                    title: 'Cancel Request',
                    message: 'Are you sure you want to <b>cancel</b> this request? This action cannot be undone.',
                    cancelText: 'No',
                    confirmText: 'Yes',
                    type: 'is-danger',
                    hasIcon: true,
                    icon: 'close',
                    onConfirm: () => this.updateStatus()
                })
            },
            updateStatus() {
                this.isLoading = true;
                axios.post(route('api.orders.status.update', [this.order.order_number]), {slug: this.status})
                    .then((response) => {
                        if (response.data === 'success') {
                            document.location.href = route('account.orders.show', [this.order.order_number])
                        }
                    })
                    .catch((error) => {
                        this.isLoading = false;
                        this.$toast.open({
                            message: 'An error occurred. Please try again',
                            type: 'is-danger'
                        });
                    });
            }
        },
    }
</script>