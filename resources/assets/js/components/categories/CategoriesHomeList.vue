<template>
	<section class="section bg-grey">
		<div class="container">
			<div class="main-heading">
				<p>CHOOSE NEEDED SERVICE</p>
				<h2 class="title is-3 is-spaced">Browse <span>Services</span></h2>
			</div>
			<div id="category-listing">
				<swiper :options="swiperOption">
					<div class="swiper-pagination" slot="pagination"></div>
					<swiper-slide v-for="category in categories" :key="category.id">
						<categories-list-item  :category="category" bgColor="bg-white"></categories-list-item>
					</swiper-slide>
				</swiper>

			</div>
			<div class="has-text-centered" style="margin-top: 20px;">
				<a :href="route('categories')" class="button is-primary is-medium is-uppercase">
					Browse All
				</a>
			</div>
		</div>
	</section>
</template>

<script>
	import CategoriesListItem from './CategoriesListItem';
    import { swiper, swiperSlide } from 'vue-awesome-swiper'
    export default {
        name: 'CategoriesHomeList',
        data() {
            return {
                swiperOption: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                    autoHeight: true,
                    autoplay: {
                        delay: 5000,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 10,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 10,
                        },
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 10,
                        }
                    }
                },
            }
        },
	    props: ['categories'],
	    components:{
            CategoriesListItem,
		    swiper,
		    swiperSlide
        }
    }
</script>