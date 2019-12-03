<template>
	<div class="order-detail-page">
		<div class="main-heading account-heading">
			<div>
				<a :href="route('account.orders.index')">
					<span class="icon"><i class="fa fa-arrow-left"></i></span> Back to My Requests
				</a>
			</div>
			<div class="order-heading">
				<h3>
					Request <span>#{{order.order_number}}</span>
				</h3>
				<div class="buttons">
					<template v-if="isArtisan(order.artisan)">
						<template v-if="checkStatus('awaiting')">
							<status-button :order="order" status="confirmed">
								<span class="icon"><i class="fa fa-check-square"></i></span>
								<span>Confirm Availability</span>
							</status-button>
						</template>
						<template v-if="checkStatus('in-progress')">
							<status-button :order="order" status="completed">
								<span class="icon"><i class="fa fa-check-square-o"></i></span>
								<span>Mark as Completed</span>
							</status-button>
						</template>
					</template>
					<template v-else>
						<template v-if="checkStatus('confirmed')">
							<payment-button :order="order"></payment-button>
						</template>
					</template>
					<template v-if="!checkStatus('cancelled') && !checkStatus('completed') ">
						<status-button color="is-danger" :order="order">
							<span class="icon"><i class="fa fa-close"></i></span>
							<span>Cancel Request</span>
						</status-button>
					</template>
				</div>
			</div>
		</div>

		<div class="columns has-padding-l-6 has-no-padding-l-mobile">
			<div class="column is-6-tablet">
				<div class="detail-box">
					<div class="detail-box-item">
						<h4>Status</h4>
						<div class="content">
							<span class="tag" :class="order.status.color_class">
								{{order.status.name}}
							</span>
						</div>
					</div>
					<div class="detail-box-item">
						<h4>Date Requested</h4>
						<div class="content">
							{{order.created_at}}
						</div>
					</div>
				</div>
				<div class="detail-box">
					<div class="detail-box-item" v-if="order.total_hours">
						<h4>Total Hours</h4>
						<div class="content">
							{{order.total_hours}}
						</div>
					</div>
					<div class="detail-box-item">
						<h4>Total Days</h4>
						<div class="content">
							{{order.total_days}}
						</div>
					</div>
					<div class="detail-box-item">
						<h4>Total</h4>
						<div class="content">
							{{order.total | currency }}
						</div>
					</div>
					<hr>
					<div class="detail-box-item">
						<h4>Service Provider</h4>
						<div class="content">
							<div class="media">
								<div class="media-left">
									<figure class="image is-64x64">
										<img :src="order.artisan.avatar" class="is-circled"
										     alt="Placeholder image">
									</figure>
								</div>
								<div class="media-content">
									<a :href="route('artisans.show',[order.artisan.username])" class="artisan-name" target="_blank">
										{{order.artisan.name}}<br>
										{{order.artisan.username}}
									</a>
								</div>
							</div>
							<div class="has-margin-t-5" v-if="hasArtisanIdFile(order.artisan)">
								<a :href="order.artisan.idFile" class="button is-primary is-small" target="_blank">
									<span class="icon"><i class="fa fa-eye"></i></span>
									<span>View Means of Identification</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="column is-6-tablet">
				<div class="detail-box box">
					<h4 class="service-title has-margin-b-5">{{order.item.category}} <small>{{order.item.amount | currency}}</small></h4>
					<div class="detail-box-item">
						<h4> Date(s)</h4>
						<div class="content">
							<ul>
								<li v-for="itemDate in order.item_dates">
									{{itemDate.date}}
								</li>
							</ul>
						</div>
					</div>
					<div class="detail-box-item">
						<h4>Location</h4>
						<div class="content" v-html="order.location"></div>
					</div>
					<div class="detail-box-item">
						<h4>Requested By</h4>
						<div class="content">
							{{order.user.name}}
						</div>
					</div>
					<div class="detail-box-item">
						<h4>Phone Number</h4>
						<div class="content">
							{{order.phone}}
						</div>
					</div>
					<div class="detail-box-item">
						<h4>Notes</h4>
						<div class="content">
							{{getNotes(order.notes)}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/babel">
    import {mapGetters, mapActions} from 'vuex';
    import OrdersStatusButton from './OrdersStatusButton';
    import OrdersPaymentButton from './OrdersPaymentButton';
    export default {
        name: 'OrdersItemSingle',
        props: ['order','currentUser'],
	    methods: {
            getNotes(notes){
                return _.isEmpty(notes) ? 'n/a' : notes;
            },
		    isArtisan(artisan){
                return artisan.id === this.currentUser.id
		    },
            checkStatus(slug){
                return this.order.status.slug === slug;
            },
            hasArtisanIdFile(artisan){
                return _.has(artisan,'idFile')
            },
	    },
	    components: {
            statusButton:OrdersStatusButton,
            paymentButton:OrdersPaymentButton,
	    }
    }
</script>

<style lang="scss" scoped>
	@import "~bulma/sass/utilities/initial-variables";
	@import "../../../sass/variables";
	@import "~bulma/sass/utilities/mixins";

	.order-heading{
		margin-top:0.75rem;
		display: flex;
		justify-content: space-between;
		@include mobile{
			display: block;
			.buttons{
				margin-top: 0.75rem;
				.button{
					display: flex;
					width: 100%;
					margin-right: 0;
				}
			}
		}
	}

	.detail-box {
		.detail-box-item {
			margin-bottom: 1rem;
			display: flex;
			align-items: center;
			h4 {
				font-weight: 600;
				width: calc(40% - 30px);
				margin-right:30px;
				font-size: 1rem;
				margin-bottom: 0;
			}
			.content {
				ul{
					margin: 0;
					padding: 0;
					list-style: none;
				}
				figure{
					margin-right: 0;
					margin-left: 0;
				}
				a.artisan-name{
					color: $black;
					&:hover{
						text-decoration: underline;
					}
				}
			}
		}
	}
	.service-title{
		small{
			font-size: 1rem;
		}
	}
</style>