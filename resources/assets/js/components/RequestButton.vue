<template>
	<div>
		<a href="#"
		   v-if="categoryId"
		   class="button is-primary"
		   @click.prevent="makeRequest(artisanId,categoryId)"
		   :class="[{'is-loading' : isLoading},size]"
		   :disabled="isLoading">
			Request Service
		</a>
	</div>
</template>

<script type="text/babel">
    export default {
        name: 'RequestButton',
        props: ['artisanId','categoryId','size'],
        data(){
            return {
                isLoading: false
            }
        },
        methods: {
            makeRequest(artisanId,categoryId){
                this.isLoading = true;
                axios.post(route('checkout.session'), {
                    artisan_id: artisanId,
                    category_id: categoryId
                })
                    .then( (response) => {
                        if(response.data === 'success'){
                            document.location.href = route('checkout')
                        }
                    })
                    .catch( (error) => {
                        this.isLoading = false;
                        this.$toast.open({
	                        message: 'An error occurred. Please try again',
	                        type: 'is-danger'
                        });
                    });
            }
        }
    }
</script>