<template>
	<div class="account-orders">
		<div class="main-heading account-heading">
			<h3 class="is-pulled-left">My <span>Requests</span></h3>
			<a :href="route('categories')" class="button is-primary is-pulled-right">Make a Request</a>
			<div class="is-clearfix"></div>
		</div>
		<transition name="fade">
			<router-view></router-view>
		</transition>
	</div>
</template>

<script type="text/babel">
    import {mapGetters} from 'vuex';
    import VueRouter from 'vue-router'
	import OrdersTableList from './OrdersTableList';
	import OrdersItemSingle from './OrdersItemSingle';

    const router = new VueRouter({
        mode: 'history',
	    routes : [
            { path: '/', component: OrdersTableList },
            { name:'orders.single', path: '/:orderNumber', component: OrdersItemSingle }
        ]
    });

    export default {
        name: 'Orders',
        computed: {
            ...mapGetters([
                'orders'
            ])
        },
	    router
    }
</script>