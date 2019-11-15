<template>
		<b-select placeholder="Select a name">
			<option
					v-for="state in states"
					:value="state.id"
					:key="state.id">
				{{ state.name }}
			</option>
		</b-select>
</template>

<script type="text/babel">
    export default {
        name: 'StatesSelectInput',
        data() {
            return {
                states: []
            }
        },
        methods: {
            populate() {
                axios.get(route('api.states.index'))
                    .then((response) => {
                        this.states = response.data;
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