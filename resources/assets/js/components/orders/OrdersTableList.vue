<template>
	<b-table
			v-if="orders.length"
			:data="orders"
			:loading="isFetching">
		<template slot-scope="props">
			<b-table-column field="order_number" label="#" >
				{{ props.row.order_number }}
			</b-table-column>
			<b-table-column field="status_id" label="Status">
				<span class="tag" :class="props.row.status.color_class">
					{{props.row.status.name}}
				</span>
			</b-table-column>
			<b-table-column label="Service">
				{{ props.row.item.category }}
			</b-table-column>
			<b-table-column field="total" label="Total" >
				{{ props.row.total | currency }}
			</b-table-column>
			<b-table-column field="created_at" label="Date Requested" >
				{{ props.row.created_at }}
			</b-table-column>
			<b-table-column>
				<a :href="route('account.orders.show',[props.row.order_number])" class="button is-primary is-small">
					<span class="icon"><i class="fa fa-eye"></i></span>
					<span>View Request</span>
				</a>
				<!--<router-link :to="{ name: 'orders.single', params: {orderNumber: props.row.order_number} }" class="button is-outlined is-primary is-small">View Request</router-link>-->
			</b-table-column>
		</template>
	</b-table>
	<div v-else>
		<div class="no-orders-notification">
			<span class="icon"><i class="fa fa-ban"></i></span>
			<p>You don't have any request</p>
		</div>
	</div>

</template>

<script type="text/babel">
    import {mapGetters,mapActions} from 'vuex';
    export default {
        name: 'OrdersTableList',
	    data() {
          return {
              isFetching : false
          }
	    },
        computed: {
            ...mapGetters([
                'orders'
            ])
        },
	    methods: {
		    ...mapActions([
		        'getOrders'
		    ])
	    },
        mounted() {
            this.isFetching = true;
            this.getOrders().then(()=>{
                this.isFetching = false;
            });
        },
    }
</script>

<style lang="scss" scoped>
	.no-orders-notification{
		text-align: center;
		margin-top:2rem;
		span{
			font-size: 5rem;
			color: #d5d5d5;
		}
		p{
			margin-top: 1rem;
		}
	}
</style>