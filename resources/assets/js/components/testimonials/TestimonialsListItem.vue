<template>
	<div class="client-testimonial">
		<div class="pic"><img :src="testimonial.avatar" alt=""></div>
		<p class="client-description">{{testimonial.body}}</p>
		<h3 class="client-testimonial-title">{{testimonial.name}}</h3>
	</div>
</template>

<script type="text/babel">
	export default {
	    name: 'TestimonialsListItem',
		props:['testimonial']
	}
</script>

<style>

</style>