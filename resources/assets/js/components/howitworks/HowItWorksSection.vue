<template>
	<section class="section how-it-works">
		<div class="container">
			<div class="main-heading">
				<p>How It Works</p>
				<h2 class="title is-3 is-spaced">Our Work <span>Process</span></h2>
			</div>

			<b-tabs position="is-centered" type="is-boxed" class="block">
				<b-tab-item label="For Service Providers">
					<artisan-tab></artisan-tab>
				</b-tab-item>
				<b-tab-item label="Finding A Service Provider">
					<user-tab></user-tab>
				</b-tab-item>
			</b-tabs>

		</div>
	</section>
</template>

<script type="text/babel">
	import ArtisanTab from './ArtisanTab';
	import UserTab from './UserTab';
    export default {
        name: 'HowItWorksSection',
        data(){
            return {
                isLoading: false
            }
        },
	    components: {
            ArtisanTab, UserTab
        }
    }
</script>