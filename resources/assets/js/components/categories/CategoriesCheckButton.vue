<template>

		<div class="field">
			<input @change="$emit('change', item, $event)"
			       class="is-checkradio"
			       :id="uniqueId"
			       type="checkbox"
			       :value="item"
			       :checked="checked"
			       name="categoryItems">
			<label :for="uniqueId">{{item.category}} - <strong>{{item.amount | currency }}</strong></label>

	</div>
</template>

<script>
    export default {
        name: 'CategoriesCheckButton',
	    props: ['item','checked'],
	    computed: {
            uniqueId(){
                return 'categoryItems'+this.item.id
            }
	    }
    }
</script>

<style lang="scss" scoped>
	.is-checkradio + label{
		margin:0 !important;
	}
</style>