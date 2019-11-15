<template>
		<b-select placeholder="Select a name">
			<option v-for="city in cities"
			:value="city.id"
			:key="city.id">
			{{ city.name }}
			</option>
		</b-select>
</template>

<script type="text/babel">
    export default {
        name: 'CitiesSelectInput',
        data() {
            return {
                cities: []
            }
        },
        methods: {
            populate() {
                axios.get(route('api.cities.index'))
                    .then((response) => {
                        this.cities = response.data;
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