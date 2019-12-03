<template>
		<b-select name="city_id" v-model="selectedCityId" expanded :loading="isLoading" required @input="onChange">
			<option
					:value="null"
					selected
					disabled
					hidden>
				Select a City
			</option>
			<option v-for="city in cities"
			        :value="city.id"
				:key="city.id">
			{{ city.name }}
			</option>
		</b-select>
</template>

<script type="text/babel">
    import {mapGetters} from 'vuex';
    export default {
        name: 'CitiesSelectInput',
        props: [
            'selected'
        ],
	    data(){
            return {
                selectedCityId: 0
            }
	    },
        computed: {
            ...mapGetters([
                'cities',
	            'isLoading'
            ]),
        },
        watch: {
            selected(value){
                this.selectedCityId = value
            }
        },
	    methods: {
          onChange(selectedCityId){
              let city = this.cities.find(item => item.id === selectedCityId)
              if(!_.isEmpty(city)) this.$emit('cityInputChange', city)
          }
	    },
        mounted() {
                this.selectedCityId = (this.selected) ? this.selected : null;
        }
    }
</script>