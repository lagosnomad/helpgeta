<template>
	<div class="navbar-burger burger" data-target="navMenu" @click.prevent="showMobileNav()">
		<span></span>
		<span></span>
		<span></span>
	</div>
</template>

<script>
    export default {
        name: 'NavBurger',
        data() {
            return {
                toggleMobileNav: false
            }
        },
	    methods: {
            showMobileNav(){
                this.$store.commit('UPDATE_OPEN_MOBILE_NAV',!this.toggleMobileNav)
            }
	    },
    }
</script>