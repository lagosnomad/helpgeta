<template>
		<b-select placeholder="Select a Category" name="category_id" v-model="selectedCategoryId" expanded :loading="isLoading" required>
			<!--<option>&#45;&#45;Select a Category&#45;&#45;</option>-->
			<option
					v-for="category in categories"
					:value="category.id"
					:key="category.id">
				{{ category.category }}
			</option>
		</b-select>
</template>

<script type="text/babel">
	import {mapGetters} from 'vuex';
    export default {
        name: 'CategoriesSelectInput',
        data() {
            return {
                categories: [],
	            isLoading: false
            }
        },
	    computed: {
            selectedCategoryId: {
                get () {
                    return this.$store.getters.selectedCategoryId
                },
                set (value) {
                    this.$store.dispatch('getCategoryNestedItems',value);
                        //this.$store.commit('RESET_SELECTED_SUB_CATEGORIES_ITEMS');
                }
            }
	    },
	    /*watch: {
            selectedCategoryId(){
                this.$store.dispatch('getCategoryNestedItems',this.selectedCategoryId);
            }
	    },*/
        methods: {
            /*onChange(){
                this.$store.commit('RESET_SELECTED_SUB_CATEGORIES_ITEMS');
            },*/
            populate() {
                this.isLoading = true;
                axios.get(route('api.categories.index'))
                    .then((response) => {
                        this.isLoading = false;
                        this.categories = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.populate();
        }


    }
</script>