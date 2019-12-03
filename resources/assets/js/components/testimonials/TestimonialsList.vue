<template>
	<section class="section bg-grey" id="testimonials">
		<div class="container">
			<div class="main-heading">
				<p>What our clients are saying</p>
				<h2 class="title is-3 is-spaced">Our Success <span>Stories</span></h2>
			</div>

			<swiper :options="swiperOption">
				<div class="swiper-pagination" slot="pagination"></div>
				<swiper-slide v-for="testimonial in testimonials" :key="testimonial.id">
					<testimonials-list-item :testimonial="testimonial"></testimonials-list-item>
				</swiper-slide>
			</swiper>
		</div>
	</section>
</template>

<script type="text/babel">
    import TestimonialsListItem from './TestimonialsListItem';
    import {swiper, swiperSlide} from 'vue-awesome-swiper';

    export default {
        name: 'TestimonialsList',
        props: ['testimonials'],
        data() {
            return {
                swiperOption: {
                    slidesPerView: 3,
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
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 5,
                        },
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 5,
                        },
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 10,
                        }
                    }
                },
            }
        },
        components: {
            TestimonialsListItem,
            swiper,
            swiperSlide
        }
    }
</script>

<style>

</style>