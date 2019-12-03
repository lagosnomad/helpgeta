<template>
	<div :class="{'mobile-nav-open':openMobileNav}">
		<div class="mobile-nav-overlay" @click="closeMobileNav()"></div>
		<div class="mobile-nav">
			<slot></slot>
		</div>
	</div>
</template>

<script>
	import {mapGetters} from 'vuex'
    export default {
        name: 'MobileNav',
        data() {
            return {}
        },
	    computed: {
		    ...mapGetters([
		        'openMobileNav'
		    ])
	    },
	    methods: {
            closeMobileNav(){
                this.$store.commit('UPDATE_OPEN_MOBILE_NAV',false)
            }
	    }
    }
</script>

<style lang="scss" scoped>
	.mobile-nav-open{
		&.is-hidden{
			display: block !important;
		}
		.mobile-nav-overlay{
			background-color: rgba(0,0,0,.5);
			height: 100%;
			overflow: hidden;
			position: fixed;
			top: 0;
			width: 100vw;
			z-index: 2005;
		}
		.mobile-nav{
			transform: translateX(0);
		}
	}
	.mobile-nav{
		background-color: #fff;
		position: fixed;
		z-index: 2006;
		width: 272px;
		height: 100%;
		padding: 20px;
		display: flex;
		flex-direction: column;
		transform: translateX(-100%);
		transition: transform 300ms ease;
		.mobile-nav-buttons{
			.navbar-item{
				padding:0 !important;
				margin-bottom:1.5rem;
			}
		}
		.navbar-dropdown .navbar-item {
			 padding-left: 1rem !important;
			 padding-right: 1rem !important;
		}
		.navbar-link .username{
			color:#4a4a4a;
			font-weight: 500;
		}
	}
</style>