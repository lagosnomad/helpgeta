<template>
	<div class="has-padding-l-5 has-no-padding-l-mobile">
		<div class="summary-widget" v-if="checkEmptySelectedCategory">
			<p class="title is-6">Selected Service</p>
			<table class="table">
				<tbody>
				<tr>
					<td>{{selectedCategory.category}}</td>
					<td>{{selectedCategory.pivot.amount | currency}}</td>
				</tr>
				</tbody>
			</table>
		</div>
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
								{{requestDate.date | formatDate}}
							</div>
							<div class="level-item" v-if="requestDate.hours">
								<strong>Hours: </strong> {{requestDate.hours}}
							</div>
						</div>
					</div>
				</div>
				<span class="has-text-danger" v-else>
						No day(s) has been added for the selected service above.
				</span>
			</div>
		</div>
		<!--<div class="summary-widget">
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
		</div>-->
		<div class="summary-total">
			<table class="table is-fullwidth">
				<tr>
					<td class="v-align">
						<span class="title is-6">Total Days: </span>
					</td>
					<td>
						<span class="is-size-5">{{checkoutTotalDays}}</span>
					</td>
				</tr>
				<tr v-if="selectedCategory.is_hourly_based">
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
			<div class="buttons">
				<checkout-button></checkout-button>
			</div>
		</div>
		<div class="is-clearfix"></div>
	</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import CheckoutButton from './CheckoutButton';

    export default {
        name: 'CheckoutSummary',
        computed: {
            checkEmptySelectedCategory() {
                return !_.isEmpty(this.selectedCategory);
            },
            ...mapGetters([
                'selectedCategory',
                'requestDates',
                'checkoutTotal',
                'checkoutTotalHours',
                'checkoutTotalDays',
                'artisan',
                'category'
            ]),
        },
        components: {
            CheckoutButton
        }

    }
</script>

<style lang="scss" scoped>
	.summary-widget {
		margin-bottom: 1rem;
		.table {
			margin: 0;
		}
		.title {
			margin-bottom: 0.85rem !important;
		}
	}

	.level {
		padding: .8rem;
		&:not(:last-child) {
			margin-bottom: 0;
			border-bottom: 1px solid #dbdbdb;
		}
		.level-item strong {
			display: inline-block;
			margin-right: 10px;
		}
	}

	.summary-total {
		margin-top: 1rem;
		.table {
			margin-bottom: 1.5rem !important;
		}
		.label {
			/*font-size: .94rem;
			font-weight: 600*/
		}
		.v-align {
			vertical-align: middle;
		}
	}
</style>