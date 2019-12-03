<template>
		<div class="card artisan-card has-border-bottom">
			<div class="card-content" :class="{'is-paddingless-t':checkout}">
				<div class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img :src="artisan.avatar" class="is-circled"
							     alt="Placeholder image">
						</figure>
					</div>
					<div class="media-content">
						<a :href="getArtisanUrl" class="artisan-card-name">
							{{artisan.business_name}}
							<span class="tag is-success is-rounded" v-if="artisan.is_verified">Verified</span>
						</a>
						<div class="level">
							<div class="level-left">
								<div class="level-item">
									<div class="ratings">
										<span class="average-rating is-size-7">0.0</span>
										<span class="is-hidden-mobile">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</span>
										<span class="is-size-6">0 Reviews</span>
									</div>
								</div>
								<div class="level-item is-size-6">
									<span class="icon"><i class="fa fa-map-marker"></i></span>
									{{artisan.location}}
								</div>
							</div>
						</div>
						<div class="bio" v-if="!checkIsEmptyBio">
							{{artisan.bio}}
						</div>
					</div>
					<div class="media-right">
						<div class="pricing" v-if="!checkout">
							<span><small>starting at</small> {{ artisan.min_price | currency }}</span>
						</div>
						<div class="buttons">
							<a
									:href="getArtisanUrl"
									class="button is-primary is-outlined"
									:class="{'is-fullwidth vertical-middle':checkout,'is-small':!checkout}">
								<template v-if="checkout">Back to Profile</template>
								<template v-else>View Profile</template>
							</a>
							<request-button :artisan-id="artisan.slug" :category-id="searchCategory.uri" size="is-small" v-if="!checkout"></request-button>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer is-hidden-mobile">
				<div class="card-footer-item">
					<span v-html="artisan.category_list"></span>
				</div>
			</div>
		</div>
</template>
<script>
	import {mapGetters} from 'vuex';
	export default {
	    name: 'ArtisansListItem',
		props:{
	        artisan: Object,
			checkout:{
	            type: Boolean,
				default: false
			}
		},
		computed:{
            checkIsEmptyBio(){
              return _.isEmpty(this.artisan.bio);
            },
            verificationLabel(){
                if(this.artisan.is_verified){
                    return `<span class="tag is-success">VERIFIED</span>`;
                }
            },
	        getArtisanUrl(){
	            let refCategory = (!_.isEmpty(this.searchCategory) || this.searchCategory === "undefined") ? '?ref_category='+this.searchCategory.uri : '';
               return this.artisan.url+refCategory;
	        },
			...mapGetters([
			    'searchCategory'
			])
		},
	}
</script>

<style lang="scss">
	@import "~bulma/sass/utilities/mixins";
	.artisan-card{
		box-shadow: none;
		.card-content{
			padding: 1.5rem 1.5rem 0;
			@include mobile{
				padding: 1.5rem 0;
			}
			.media{
				@include mobile{
					display: block !important;
				}
				.media-content{
					@include mobile{
						text-align: center !important;
					}
					.level{
						margin-bottom:0;
						.level-item{
							@include mobile{
								display: inline-block !important;
							}
						}
					}
				}
				.media-left {
					@include mobile {
						margin-right: 0 !important;
						figure{
							margin:0 auto;
						}
					}
				}
				.media-right {
					@include mobile {
						margin-left: 0 !important;
						display: flex;
						justify-content: space-around;
						width: 100%;
					}
				}
			}
		}
		.bio{
			margin-top:.75rem;
			font-size:0.9rem;
		}
		.pricing{
			font-size:1.2rem;
			font-weight: 500;
			line-height: 1.2rem ;
			display: flex;
			justify-content: flex-end;
			small{
				text-transform: uppercase;
				font-size: 0.7rem;
				font-weight: normal;
				display: inline-block;
				vertical-align: middle;
				@include mobile{
					display: block;
				}
			}
		}
		.card-footer{
			border: none;
			.card-footer-item{
				justify-content: left;
				padding: 1rem 0.75rem 1rem;
				a{
					display: inline-block;
					margin: 0 5px 5px;
					padding:3px;
					font-size:0.8rem;
					background: #f5f5f5;
				}
				a:hover{
					background: #ddd;
				}
			}
		}
	}
</style>