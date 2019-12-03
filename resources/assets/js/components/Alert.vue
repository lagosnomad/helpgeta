<template>

</template>

<script type="text/babel">
    export default {
        name: 'Alert',
        props: ['type'],
        mounted(){
            this.$toast.open({
                duration: 5000,
                message: this.$slots.default[0].text,
                type: this.type
            })
        },
    }
</script>