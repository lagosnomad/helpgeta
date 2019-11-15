<template>
	<div class="box summary-box bg-grey">
		<p class="title is-5">Request Summary</p>
		<p>Below are the summarized details of the above selections</p>
		<div class="summary-widget">
			<p class="title is-6">Selected Days</p>
			<div class="content">
				<div v-if="requestDates.length">
					<div class="level" v-for="(requestDate, key) in requestDates">
						<div class="level-left">
							<div class="level-item">
								{{key + 1}}.
							</div>
							<div class="level-item">
								<strong>Date: </strong>
								{{requestDate.date | formatDate}}
							</div>
							<div class="level-item" v-if="requestDate.hours">
								<strong>No. of Hours: </strong> {{requestDate.hours}}
							</div>
						</div>
					</div>
				</div>
				<span class="has-text-danger" v-else>
						No date has been added, please add a date in the "selected date  &  time" section above
				</span>
			</div>
		</div>
		<div class="summary-widget">
			<p class="title is-6">Selected Service(s)</p>
			<div class="content">
				<table class="table" v-if="selectedCategoryItems.length">
					<thead>
					<tr>
						<th>Service</th>
						<th>Amount</th>
					</tr>
					</thead>
					<tbody>
					<tr v-for="item in selectedCategoryItems">
						<td>{{item.category}}</td>
						<td>{{item.amount | currency}}</td>
					</tr>
					</tbody>
				</table>
				<span class="has-text-danger" v-else>
					No sub services has been selected, select one or more sub services in the "Service Selected and Pricing" Section above
				</span>
			</div>
		</div>
		<div class="summary-total">
			<table class="table">
				<tr>
					<td class="v-align">
						<span class="title is-6">Total Days: </span>
					</td>
					<td>
						<span class="is-size-5">{{checkoutTotalDays}}</span>
					</td>
				</tr>
				<tr v-if="category.is_hourly_based">
					<td class="v-align">
						<span class="title is-6">Total Hours: </span>
					</td>
					<td>
						<span class="is-size-5">{{checkoutTotalHours}}</span>
					</td>
				</tr>
				<tr>
					<td class="v-align">
						<span class="title is-6">Total: </span>
					</td>
					<td>
						<span class="is-size-3 has-text-weight-semibold">{{checkoutTotal | currency}}</span>
					</td>
				</tr>
			</table>
			<div class="buttons is-pulled-right">
				<checkout-payment></checkout-payment>
			</div>
		</div>
		<div class="is-clearfix"></div>
	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import CheckoutPayment from './CheckoutPayment';
    export default {
        name: 'CheckoutSummary',
        computed: {
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
	    components: {
            CheckoutPayment
	    }

    }
</script>

<style lang="scss" scoped>
	.summary-box {
		.title {
			margin-bottom: 1rem;
		}
		.table {
			background: transparent !important;
		}
		.summary-widget {
			margin-top: 2rem;
			.title {
				margin-bottom: 0.8rem;
			}
		}
		.level{
			padding: .8rem;
			&:not(:last-child){
				margin-bottom: 0;
				border-bottom: 1px solid #dbdbdb;
			}
			.level-item strong{
				display:inline-block;
				margin-right: 10px;
			}
		}
		.summary-total {
			margin: 1.5rem 0 1rem;
			float: right;
			.table{
				margin-bottom: 1.5rem !important;
			}
			.label{
				/*font-size: .94rem;
				font-weight: 600*/
			}
			.v-align{
				vertical-align: middle;
			}
		}
	}
</style>